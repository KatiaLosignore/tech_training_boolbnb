<?php

namespace Database\Seeders;

use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsorships = [
            [
                'name' => 'Bronze',
                'price' => 2.99,
                'duration' => '24:00:00'
            ],
            [
                'name' => 'Silver',
                'price' => 5.99,
                'duration' => '72:00:00'
            ],
            [
                'name' => 'Gold',
                'price' => 9.99,
                'duration' => '144:00:00'
            ],
        ];

        foreach ($sponsorships as $sponsor) {
            $sponsorship = new Sponsorship();

            $sponsorship->name = $sponsor['name'];
            $sponsorship->price = $sponsor['price'];
            $sponsorship->duration = $sponsor['duration'];

            $sponsorship->save();
        }
    }
}
