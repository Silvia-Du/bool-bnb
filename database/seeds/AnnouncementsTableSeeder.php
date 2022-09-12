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
    public function run()
    {
        $house_types = ['baite', 'campagna', 'wow', 'minicase', 'C.Galleggiante', 'design', 'b&b', 'luxe', 'ville', 'spazi creativi', 'co-working', 'co-leaving'];
        $announcements = config('announcements');

        foreach($announcements as $announcement){

        $new_announcement = new Announcement();
        $new_announcement->title = $announcement['title'];
        $new_announcement->slug = Announcement::slugGenerator($new_announcement->title);
        $new_announcement->description = $announcement['description'];
        $new_announcement->rooms = $announcement['rooms'];
        $new_announcement->beds = $announcement['beds'];
        $new_announcement->bathrooms = $announcement['bathrooms'];
        $new_announcement->mq = $announcement['mq'];
        $new_announcement->address = $announcement['address'];
        $new_announcement->latitude = $announcement['latitude'];
        $new_announcement->longitude =$announcement['longitude'];
        $new_announcement->is_visible = $announcement['is_visible'];
        $new_announcement->house_type = $announcement['house_type'];
        $new_announcement->price = $announcement['price'] . '€';
        $new_announcement->room_type = $announcement['room_type'];
        $new_announcement->user_id = 10;
        // $user_id = User::inRandomOrder()->first()->id;
        // $new_announcement->user_id = $user_id;

        $new_announcement->save();
       };
    }
}
