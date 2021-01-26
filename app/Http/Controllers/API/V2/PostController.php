<?php

namespace App\Http\Controllers\API\V2;

use App\Events\EndOfIndexing;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PostResource;
use App\Models\Post;
use \App\Http\Controllers\API\V1\PostController as V1PostController;
use Illuminate\Http\Request;

class PostController extends V1PostController
{
    public function index()
    {
        $posts = Post::/*on('mysql2')->*/limit(1)->get()/*->paginate()*/;
        return PostResource::collection($posts);
    }

//    public function show(Post $post)
//    {
//        return new PostResource($post);
//    }
}
