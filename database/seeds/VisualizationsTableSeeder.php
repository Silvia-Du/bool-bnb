<?php

use Illuminate\Database\Seeder;
use App\Visualization;
use App\Announcement;
use Faker\Generator as Faker;


class VisualizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i <800; $i++)
        {
            $new_visualization = new Visualization();
            $new_visualization->ip_address = $faker->ipv4();
            $new_visualization->create_date = $faker->dateTimeBetween('-30 week ');
            $announcement_id = Announcement::inRandomOrder()->first()->id;
            $new_visualization->announcement_id = $announcement_id;
            $new_visualization->save();
        }
    }
}
