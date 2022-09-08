<?php

namespace App\Http\Controllers\Api;

use App\Announcement;
use App\Http\Controllers\Controller;
use App\Message;
use App\Service;
use App\Sponsorization;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $announcement = Announcement::with('services')->with('sponsorizations')->paginate(20);

        return response()->json($announcement);
    }
    public function getServices(){
        $services = Service::all();

        return response()->json($services);
    }
    public function getSelectedCategory($category){
        $announcement = Announcement::where('house_type', $category)->get();
        return response()->json($announcement);
    }
    public function getAnnouncementFromLocation($location){
        $announcement = Announcement::where('address', 'LIKE', '%' . $location . '%')->with('services')->with('sponsorizations')->get();
        return response()->json($announcement);
    }

    public function postMessag(Request $request){
        $data = $request->all();

        $success= true;
        $new_message = new Message();
        $new_message->name = $data['message']['name'];
        $new_message->text = $data['message']['text'];
        $new_message->text = $data['message']['email'];
        return response()->json(['success'=>true]);

    }
    /* public function getAdvancedFilter(Request $request){
        return response()->json($request->beds);
    } */


}
