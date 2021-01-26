<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();

        Tag::factory(10)->create()->each(function ($post) use ($categories) {
            $post->categories()->attach(
                $categories->random(rand(2, 8))->pluck('id')->toArray()
            );
        });
    }
}
