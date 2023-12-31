<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'admin',
            'role' => User::ROLE_ADMIN
        ]);

        \App\Models\User::factory(5)->create();
        \App\Models\Category::factory(4)->create();
        \App\Models\Post::factory(10)->create();
        \App\Models\Tag::factory(3)->create();
        \App\Models\Comment::factory(20)->create();
        \App\Models\PostTag::factory(10)->create();
        \App\Models\PostUserLike::factory(50)->create();
        \App\Models\Course::factory(3)->create();
        \App\Models\Review::factory(5)->create();
        \App\Models\Gallery::factory(5)->create();
    }
}
