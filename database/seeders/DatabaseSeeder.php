<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
//            TransactionsSeeder::class,
//            UsersSeed::class,
        ]);
//         \App\Models\User::factory()->count(428)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $posts = \App\Models\Post::all();

        foreach ($posts as $post) {

            $post->update(['user_id' => \App\Models\User::inRandomOrder()->first()->id]);
        }

        $replies = \App\Models\Reply::all();

        foreach ($replies as $reply) {
            $reply->update(['user_id' => \App\Models\User::inRandomOrder()->first()->id]);
        }
    }
}
