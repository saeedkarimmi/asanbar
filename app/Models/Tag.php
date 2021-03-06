<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_tags');
    }

    public function posts()
    {
        return $this->belongsToMany(PostTag::class, 'post_tags');
    }

}
