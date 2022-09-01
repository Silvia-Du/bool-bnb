<?php

namespace App\Http\Controllers\Api;

use App\Announcement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $announcement = Announcement::all();
        dd($announcement);

        return response()->json($announcement);
    }
}
