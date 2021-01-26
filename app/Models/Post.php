<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }

    public function categories()
    {
        return Post::query()->join('post_tags', 'post_tags.post_id', 'posts.id')
            ->leftjoin('tags', 'tags.id', 'post_tags.post_id')
            ->leftjoin('category_tags', 'category_tags.tag_id', 'tags.id')
            ->leftjoin('categories', 'categories.id', 'category_tags.category_id')
            ->where('posts.id' , $this->id)
            ->distinct();
    }
}
