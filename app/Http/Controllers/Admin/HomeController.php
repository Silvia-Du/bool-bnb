<?php

namespace App\Http\Controllers\Admin;

use App\Announcement;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $user = User::find($user_id);
        return view('admin.home', compact('user') );
    }
    public function message()
    {
        $user_id = Auth::id();
        $user = User::find($user_id);
        $announcements = Announcement::where('user_id', $user_id)->with('messages')->get();
        return view('admin.announcements.message', compact('announcements', 'user'));
    }
}
