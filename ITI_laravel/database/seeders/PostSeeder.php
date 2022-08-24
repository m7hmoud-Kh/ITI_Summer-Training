<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i=0; $i < 15 ; $i++) {
            Post::create([
                'name' => $faker->name(),
                'desc' => $faker->paragraph(),
                'price' => $faker->numberBetween(10,50),
                'image' => $faker->numberBetween(1,6).'.jpg'
            ]);
        }
    }
}
