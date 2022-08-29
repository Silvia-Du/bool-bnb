<?php

use App\Announcement;
use App\Service;
use Illuminate\Database\Seeder;

class AnnouncementServiceTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for( $i=0 ; $i < 40 ; $i++ ){
            $announcement = Announcement::inRandomOrder()->first();

            $service_id = Service::inRandomOrder()->first()->id;

            $announcement->service()->attach($service_id);
       }

    //    $announcements = Announcement::all();

    //    $service_id = Service::inRandomOrder()->limit(rand(1, 9))->get();
    //    dd($service_id);

    }
}
