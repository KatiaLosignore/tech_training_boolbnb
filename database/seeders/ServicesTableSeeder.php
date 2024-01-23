<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = ['WiFi', 'Aria condizionata', 'Parcheggio gratuito', 'Piscina', 'Portineria', 'Sauna', 'Vista Mare'];

        foreach ($services as $service) {
            $newService = new Service();
            $newService->name = $service;
            $newService->save();
        }
    }
}






