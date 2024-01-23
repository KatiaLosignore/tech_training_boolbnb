<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
      for ($i= 0; $i < 10; $i++) {
        $user = new User();
        $user->name = $faker->name();
        $user->surname = $faker->lastName();
        $user->date_of_birth = $faker->dateTimeBetween('1980-01-01', '2000-12-31')->format('Y-m-d');
        $user->email = $faker->unique()->safeEmail();
        $user->email_verified_at = null;
        $user->password = Hash::make('password');
        $user->remember_token = null;

        $user->save();
      }

    }
}
