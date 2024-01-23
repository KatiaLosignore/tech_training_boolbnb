<?php

namespace Database\Seeders;

use App\Models\Apartment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for ($i = 0; $i < 10; $i++) {
            $apartment = new Apartment();
            $apartment->user_id = $faker->unique()->numberBetween(1, 10); // Assicura user_id univoci
            $apartment->name = $faker->text();
            $apartment->rooms = $faker->numberBetween(1, 5);
            $apartment->beds =  $faker->numberBetween(1, 4);
            $apartment->bathrooms = $faker->numberBetween(1, 2);
            $apartment->mq = $faker->numberBetween(35, 80);
            $apartment->address = $faker->address();
            $apartment->lat = $faker->latitude(45.2, 45.5);
            $apartment->lon = $faker->longitude(8.8, 9.3);
            $apartment->photo = $faker->imageUrl();
            $apartment->visible = true;

            $apartment->save();
        }
    }
}
