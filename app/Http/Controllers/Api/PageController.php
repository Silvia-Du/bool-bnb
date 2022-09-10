<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\DB;

use App\Announcement;
use App\Http\Controllers\Controller;
use App\Message;
use App\Service;
use App\Sponsorization;
use App\Visualization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

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
    public function getAnnouncementDetails($id){
        $announcement = Announcement::where('id', $id)->with('services')->with('sponsorizations')->get();
        $user = DB::table('users')
        ->join('announcements', 'announcements.user_id', '=', 'users.id')
        ->where('announcements.id', $id)
        ->get();
        return response()->json(compact('announcement', 'user'));
    }

    public function postMessag(Request $request){
        $data = $request->all();

        $success= true;
        $new_message = new Message();
        $new_message->name = $data['message']['name'];
        $new_message->text = $data['message']['text'];
        $new_message->email = $data['message']['email'];
        $new_message->announcement_id = $data['message']['announcement'];
        $new_message->save();
        if(!$new_message->save()){
            return response()->json([
                'success' => false,
            ]);
        }
        return response()->json(['success'=>true]);

    }
    /* public function getAdvancedFilter(Request $request){
        return response()->json($request->beds);
    } */
    public function postVisualization(Request $request){
        $data= $request->all();
        $old_data = Visualization::where('ip_address', $data['params']['ip_address'])->where('create_date', date("Y-m-d"))->get();
        if(count($old_data) > 0){
            $success = count($old_data) > 0;
        }else{
            $new_visualization = new Visualization();
            $new_visualization->create_date = date("Y-m-d");
            $new_visualization->announcement_id = $data['params']['ann_id'];
            $new_visualization->ip_address = $data['params']['ip_address'];
            $new_visualization->save();
            $success = 'non esiste';
        }
        

        return response()->json([$success]);
    }

}
