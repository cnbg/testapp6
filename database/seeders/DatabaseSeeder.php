<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name'           => 'Test User',
            'email'          => 'user@test.com',
            'password'       => bcrypt('123456'),
            'remember_token' => Str::random(10),
        ]);

        $this->call([
            PostSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
