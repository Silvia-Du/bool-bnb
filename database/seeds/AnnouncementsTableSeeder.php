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
        $new_announcement->rooms = $faker->numberBetween(1, 10);
        $new_announcement->beds = $faker->numberBetween(1, 5);
        $new_announcement->bathrooms = $faker->numberBetween(1, 5);
        $new_announcement->mq = $faker->numberBetween(50, 250);
        $new_announcement->address = $faker->streetAddress();
        $new_announcement->city = $faker->city();
        $new_announcement->city = $faker->country();
        $new_announcement->latitude = $faker->latitude($min = -90, $max = 90);
        $new_announcement->longitude = $faker->longitude($min = -180, $max = 180);
        $new_announcement->visible = $faker->numberBetween(0, 1);
        $new_announcement->house_type = 'Villa';
        $new_announcement->room_type = 'Stanza singola';
        $new_announcement->save();
       }
    }
}
