<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Exception;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $faker = Factory::create();

        $users = User::pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++) {
            Post::create([
                'user_id' => Arr::random($users),
                'title'   => $faker->sentence,
                'link'    => $faker->url,
                'content' => $faker->paragraph,
                'upvote'  => random_int(0, 99),
            ]);
        }
    }
}
