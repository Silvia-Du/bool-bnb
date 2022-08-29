<?php

use App\Announcement;
use App\Sponsorization;
use Illuminate\Database\Seeder;

class AnnouncementSponsorizationTable extends Seeder
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
        $tot_random = rand(1, 10);
        for($i=0; $i< $tot_random; $i++){
            $sponsorization_id = Sponsorization::inRandomOrder()->first()->id;
        }
    }




    }
 }



       //ciclo tutti gli annunci,
       //gli associo una quantità random di sponsorizzazioni
       //per ogni sponsorizzazione fatta creo una data randomica nel    passato e nel futuro
       //
       //associo l'id- e la data.
