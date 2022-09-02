<?php

namespace App\Http\Controllers\Admin;
use App\http\Requests\AnnouncementRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\Announcement;
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
        dd('eccoci');
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
        $announcement = Announcement::find($id);
        return view('admin.announcements.show', compact('announcement'));
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

    // public function getAnnouncements()
    // {
    //     $announcements = Announcement::all();
    //     return $announcements;
    // }
}
