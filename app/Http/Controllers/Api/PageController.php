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

class PageController extends Controller
{
    public function index(){
        // ->whereDate('created_at', '2016-12-31')
        // $announcement = Announcement::with('services')->with('sponsorizations')->paginate(20);
        $announcement = Announcement::
                        // where([['sponsorization_id','=' ,'1'] ])->
                        with('services')->with('sponsorizations')->paginate(20);





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

        $new_visualization = new Visualization();
        $new_visualization->announcement_id = $data['click']['ann_id'];
        $new_visualization->ip_address = $data['click']['ip_address'];
        $new_visualization->save();




        return response()->json(['success'=>true]);
    }

}
