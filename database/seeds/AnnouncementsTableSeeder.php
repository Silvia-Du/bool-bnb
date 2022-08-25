<?php

use Illuminate\Database\Seeder;
use App\Announcement;
use Faker\Generator as Faker;

class AnnouncementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
       for($i=0; $i<10; $i++){

        $new_announcement = new Announcement();
        $new_announcement->title = $faker->words(4);
        $new_announcement->slug = Announcement::slugGenerator($new_announcement->title);
       }
    }
}
