<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()->limit(30)->paginate();
        return PostResource::collection($posts);
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }
}
