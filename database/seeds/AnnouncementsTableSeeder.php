<?php

use Illuminate\Database\Seeder;
use App\Announcement;
use App\User;
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
        $house_types = ['baite', 'campagna', 'wow', 'minicase', 'camper', 'design', 'b&b', 'luxe', 'ville', 'spazi creativi', 'co-working', 'co-leaving'];

       for($i=0; $i<20; $i++){
        $new_announcement = new Announcement();
        $new_announcement->title = $faker->words(4, true);
        $new_announcement->slug = Announcement::slugGenerator($new_announcement->title);
        $new_announcement->description = $faker->text(400);
        $new_announcement->rooms = $faker->numberBetween(1, 10);
        $new_announcement->beds = $faker->numberBetween(1, 5);
        $new_announcement->bathrooms = $faker->numberBetween(1, 5);
        $new_announcement->mq = $faker->numberBetween(50, 250);
        $new_announcement->address = $faker->address();
        $new_announcement->latitude = $faker->latitude($min = -90, $max = 90);
        $new_announcement->longitude = $faker->longitude($min = -180, $max = 180);
        $new_announcement->is_visible = $faker->numberBetween(0, 1);
        $new_announcement->house_type = $house_types[rand(0, 11)];
        $new_announcement->price = rand(50, 1000) . '€';
        $new_announcement->room_type = 'Stanza singola';

        $user_id = User::inRandomOrder()->first()->id;
        $new_announcement->user_id = $user_id;

        $new_announcement->save();
       };
    }
}
