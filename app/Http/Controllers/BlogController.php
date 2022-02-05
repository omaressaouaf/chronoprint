<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        return view("blog.index", [
            "posts" => Post::active()->latest()->paginate(5),
            "popularPosts" => Post::active()->wherePopular(true)->inRandomOrder()->get()
        ]);
    }

    public function show(Post $post)
    {
        $relatedPosts = Post::inRandomOrder()->take(3)->get();

        return view("blog.show", compact("post", "relatedPosts"));
    }
}
