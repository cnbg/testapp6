<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $users = User::pluck('id')->toArray();
        $posts = Post::pluck('id')->toArray();

        for ($i = 0; $i < 500; $i++) {
            Comment::create([
                'user_id' => Arr::random($users),
                'post_id' => Arr::random($posts),
                'content' => $faker->paragraph,
            ]);
        }
    }
}
