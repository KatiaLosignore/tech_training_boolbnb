<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        for ($i= 0; $i < 10; $i++) {
            $message = new Message();
            $message->apartment_id = $faker->unique()->numberBetween(4, 13); // Assicura apartment_id univoci
            $message->name = $faker->name();
            $message->lastname = $faker->lastName();
            $message->email = $faker->unique()->safeEmail();
            $message->text = $faker->text();

            $message->save();
        }
    }
}
