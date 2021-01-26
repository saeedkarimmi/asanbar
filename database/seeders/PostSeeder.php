<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
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
        $tags = Tag::all();

        Post::factory(100000)->create()->each(function ($post) use ($tags) {
            $post->tags()->attach(
                $tags->random(rand(2, 5))->pluck('id')->toArray()
            );
        });
    }
}
