<?php

use App\Announcement;
use App\Sponsorization;
use Illuminate\Database\Seeder;

class AnnouncementSponsorizationTableSeeder extends Seeder
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
            $tot_random = rand(0, 1);
            for($i=0; $i< $tot_random; $i++){
                $sponsorization_id = Sponsorization::inRandomOrder()->first()->id;
                    $announcement->sponsorizations()->attach($sponsorization_id);
            }
        }

    }
}







