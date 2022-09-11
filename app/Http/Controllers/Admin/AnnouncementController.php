<?php

namespace App\Http\Controllers\Admin;
use App\http\Requests\AnnouncementRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\Visualization;
use App\Announcement;
use App\Sponsorization;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;



class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $user = Auth::id();
        $announcements = Announcement::orderBy('id', 'desc')->where('user_id', $user)->get();

        return view('admin.announcements.index', compact('announcements'));

        //voglio gli annunci che hanno una sponsorizzazione non scaduta:
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();

        return view('admin.announcements.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementRequest $request)
    {

        $data = $request->all();

        $new_announcement = new Announcement();

        $encoded_address = urlencode($data['address']);
        $response = Http::get('https://api.tomtom.com/search/2/geocode/' .$encoded_address. '.json/?key=ieE6bIkIjKCULYNaPIeiocY8WifbHuDb');
        $response_json = $response->json();


        if (array_key_exists('image', $data)) {
            $data['image_original_name'] = $request->file('image')
                ->getClientOriginalName();
            $data['image'] = Storage::put('uploads', $data['image']);
        }

        $data['slug'] = Announcement::slugGenerator($data['title']);
        $data['user_id'] = Auth::id();
        $data['latitude'] = $response_json['results'][0]['position']['lat']; // Da inserire dopo
        $data['longitude'] = $response_json['results'][0]['position']['lon']; // Da inserire dopo

        $new_announcement->fill($data);
        $new_announcement->save();
        // dd('eccoci');
         if(array_key_exists("services", $data)){
            $new_announcement->services()->attach($data["services"]);
        }

        return redirect()->route('admin.announcements.show', $new_announcement);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $limit = 0;
        $tot_month = 6;
        $visualizations=[
            [
                'mese'=>'Gennaio',
                'visualizzazioni'=> 0
            ],
            [
                'mese'=>'Febbraio',
                'visualizzazioni'=> 0
            ],
            [
                'mese'=>'Marzo',
                'visualizzazioni'=> 0
            ],
            [
                'mese'=>'Aprile',
                'visualizzazioni'=> 0
            ],
            [
                'mese'=>'Maggio',
                'visualizzazioni'=> 0
            ],
            [
                'mese'=>'Giugno',
                'visualizzazioni'=> 0
            ]
        ];

        $announcement = Announcement::with('sponsorizations')->find($id);
        // dd($announcement);
        for ($i=0; $i < $tot_month ; $i++) {
            $month = Visualization::where('announcement_id',$id)->whereMonth('create_date', $limit)->count();


                $visualizations[0]['visualizzazioni'] = $month;

            $limit++;

            if($limit == 1){
                $visualizations[1]['visualizzazioni'] = $month;
            }
            elseif($limit == 2){
                $visualizations[2]['visualizzazioni'] = $month;
            }
            elseif($limit == 3){
                $visualizations[3]['visualizzazioni'] = $month;
            }
            elseif($limit == 4){
                $visualizations[4]['visualizzazioni'] = $month;
            }
            elseif($limit == 5){
                $visualizations[5]['visualizzazioni'] = $month;
            }


        }

        if(Auth::id() != $announcement->user_id){
            abort(403);
        }

        return view('admin.announcements.show', compact('announcement','visualizations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        if(Auth::id() != $announcement->user_id){
            abort(403);
        }
        $services = Service::all();

        return view('admin.announcements.edit', compact('announcement','services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnnouncementRequest $request, Announcement $announcement)
    {
        $data = $request->all();
        if (array_key_exists('image', $data)) {

            if ($announcement->image) {
                Storage::delete($announcement->image);
            }
            $data['image_original_name'] = $request->file('image')
                ->getClientOriginalName();
            $data['image'] = Storage::put('uploads', $data['image']);

        }

        if ($data['title'] != $announcement->title) {
            $data['slug'] = Announcement::slugGenerator($data['title']);
        }

        if(array_key_exists("services", $data)){
            $announcement->services()->sync($data["services"]);
        }else{
            $announcement->services()->detach();
        }

        $announcement->update($data);

        return redirect()->route('admin.announcements.show', $announcement);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return redirect()->route('admin.announcements.index')->with('delete_announcement', "Annuncio $announcement->title eliminato correttamente");
    }

    // public function filter()
    // {
    //     $announcements = Announcement::all();
    //     return $announcements;
    // }
}
