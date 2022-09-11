<?php

use App\Announcement;
use App\Service;
use Illuminate\Database\Seeder;

class AnnouncementServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    $announcements = Announcement::all();


    foreach($announcements as $announcement){
        $services_id = Service::inRandomOrder()->take(rand(1,5))->select('id')->get();
        //ho un tot di servizi per id
        foreach( $services_id as  $service_id){
            if(!$announcement->services->contains($service_id)){
                $announcement->services()->attach($service_id);
            }
        }
        // dd($services_id);
    }

    }
}

//per ogni annuncio

// estrai una quantità di servizi random(id)
//se non esiste quell'id tra quelli dell'annuncio
//allora attaccaglielo
