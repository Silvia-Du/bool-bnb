<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Announcement;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


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
        $data = $request->all();

        if (array_key_exists('image', $data)) {
            $data['image_original_name'] = $request->file('image')
                ->getClientOriginalName();
            $data['image'] = Storage::put('uploads', $data['image']);
        }

        $data['slug'] = Announcement::slugGenerator($data['title']);
        $data['user_id'] = Auth::id();
        $data['latitude'] = 0; // Da inserire dopo
        $data['longitude'] = 0; // Da inserire dopo
        $announcement = Announcement::create($data);

        $announcement->save();

        if (array_key_exists('tags', $data)) {
            $announcement->tags()->sync($data['tags']);
        }

        return redirect()->route('admin.announcements.show', $announcement->id);
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
    public function edit($id)
    {
        $announcement = Announcement::find($id);
        return view('admin.announcements.edit', compact('announcement'));
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
        $announcement = Announcement::find($id);
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

        $announcement->update($data);

        if (array_key_exists('tags', $data)) {
            $announcement->tags()->sync($data['tags']);
        }

        return redirect()->route('admin.announcements.show', $announcement->id);
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

        return redirect()->route('admin.announcements.index')->with('message', "Annuncio $announcements->name correttamente eliminato");
    }

    public function getAnnouncements()
    {
        $announcements = Announcement::all();
        return $announcements;
    }
}
