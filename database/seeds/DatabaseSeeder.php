<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AnnouncementsTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(SponsorizationsTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(VisualizationsTableSeeder::class);
        $this->call(AnnouncementServiceTableSeeder::class);
        $this->call(AnnouncementSponsorizationTableSeeder::class);

    }
}
