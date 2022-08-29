<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Announcement;
use Illuminate\Support\Facades\Storage;


class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $announcements = Announcement::orderBy('id', 'desc')->get();


        return view('admin.announcements.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $announcements = Announcement::All();
        return view('admin.announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $announcements = Announcement::find($id);
        return view('admin.announcements.edit', compact('announcements'));
        abort(404, 'Annuncio non trovato');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $announcements = Announcement::fin($id);
        $data = $request->all();

        if (array_key_exists('image', $data)) {
            if ($announcements->image) {
                Storage::delete($announcements->image);
            }
            $data['image_original_name'] = $request->file('image')
            ->getClientOriginalName();
            $data['image'] = Storage::put('uploads', $data['image']);
        }

        if ($data['title'] != $announcements->title) {
            $data['slug'] = Announcement::generateSlug($data['title']);
        }

        $announcements->update($data);

        if (array_key_exists('tags', $data)) {
            $announcements->tags()->sync($data['tags']);
        }

        return redirect()->route('admin.announcements.show', $announcements->slug);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $announcements = Announcement::find($id);
        $announcements->delete();

        return redirect()->route('admin.index')->with('message', "Annuncio $announcements->name correttamente eliminato");
    }

    public function getAnnouncements() {
        $announcements = Announcement::all();
        return $announcements;
    }
}
