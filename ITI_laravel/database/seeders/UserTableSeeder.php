<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i=0; $i <3 ; $i++) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->email(),
                'password' => Hash::make('123456'),
                'active' => $faker->boolean(),
                'role' => 'IsAdmin'
            ]);
        }

    }
}
