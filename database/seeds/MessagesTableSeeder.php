<?php

use Illuminate\Database\Seeder;
use App\Message;
use Faker\Generator as Faker;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<20; $i++){
            $new_message = new Message();
            $new_message->text = $faker->text(250);
            $new_message->email = $faker->email();
            $new_message->name = $faker->firstName($gender = null);
            $new_message->save();
        }
    }
}
