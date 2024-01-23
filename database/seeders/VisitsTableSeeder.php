<?php

namespace Database\Seeders;

use App\Models\Visit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class VisitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {
            $visits = new Visit();
            $visits->apartment_id = $faker->unique()->numberBetween(4, 13); // Assicura apartment_id univoci
            $visits->ip = $faker->ipv4();
            $visits->date = $faker->dateTimeThisMonth();

            $visits->save();

        }
    }
}
