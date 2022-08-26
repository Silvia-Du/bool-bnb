<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;
 

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++){
            $new_user = new User();
            $new_user->name = $faker->firstName($gender = null);
            $new_user->surname = $faker->lastName();
            $new_user->date_of_birth = $faker->date();
            $new_user->image = $faker->word();
            $new_user->image_original_name = $faker->word();
            $new_user->email = $faker->email();
            $new_user->password = 'decoroso';
            $new_user->save();
        }
    }
}
