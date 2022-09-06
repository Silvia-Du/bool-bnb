<?php

namespace App\Http\Controllers\Api;

use App\Announcement;
use App\Http\Controllers\Controller;
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
    public function getAdvancedFilter($rooms, $beds){


        $announcements = Announcement::where([
            ['beds', '>=', $beds],
            ['rooms', '>=', $rooms]
        ])->with(['sponsorizations', 'services'])->get();

        return response()->json($announcements);


    }


}
