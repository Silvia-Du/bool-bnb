<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Announcement;
use App\Message;
use App\User;


class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $ann_id_collection = [];
        // $announcements = null;
        $user_id = Auth::id();
        $user = User::find($user_id);
        if(!count($user->announcements)>0){
            $messages = Message::where('email', $user->email)->with('announcement')->get();
            // foreach($messages as $message){
            //     if(!in_array( $message->announcement_id, $ann_id_collection )){
            //         array_push($ann_id_collection, $message->announcement_id );
            //     }
            // }
            // dd($ann_id_collection);

            return view('admin.announcements.message', compact('messages', 'user'));
        }else{
            $announcements = Announcement::where('user_id', $user_id)->with('messages')->get();
            return view('admin.announcements.message', compact('announcements', 'user'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $user_id = Auth::id();
        $user = User::find($user_id);
        $message = Message::where('id', $id)->with('announcement')->get();
        // dd($message[0]['created_at']);
        return view('admin.announcements.message-view', compact('user', 'message'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

         $user_id = Auth::id();
         $user = User::find($user_id);
        if(!$user->announcement){
            // echo('non ne ha');
        }else{
            // echo('ce li ha');
        }
         $announcement = Announcement::where('id',$id)->with('messages')->get();
         // dd($id);
         $messages = Message::where('announcement_id',$id)->get();


         return view('admin.announcements.message-view', compact('announcement', 'user', 'messages'));
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
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
