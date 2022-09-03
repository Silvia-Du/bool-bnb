<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = ["bagno","lavatrice","Wi-Fi","Tv","Aria Condizionata","Macchina del caffè","piscina","biancheria da letto","minibar", "scrivania"];

        foreach($services as $service)
        {

         $new_service = new Service();
         $new_service->name = $service;
         $new_service->save();


        }
    }
}
