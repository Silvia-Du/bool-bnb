<?php

use Illuminate\Database\Seeder;
use App\Sponsorization;

class SponsorizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsorizations =
        [
            [
                "name" =>"Standard",
                "price"=> 2.99,
                "total_hours" => 24

            ],
            [
                "name" =>"Plus",
                "price"=> 5.99,
                "total_hours" => 74

            ],
            [
                "name" =>"Premium",
                "price"=> 9.99,
                "total_hours" => 144

            ],
        ];

        foreach($sponsorizations as $sponsorization){

           $new_sponsorization = new Sponsorization();
           $new_sponsorization->name = $sponsorization["name"];
           $new_sponsorization->price = $sponsorization["price"];
           $new_sponsorization->total_hours = $sponsorization["total_hours"];
           $new_sponsorization->save();
        };
    }
}
