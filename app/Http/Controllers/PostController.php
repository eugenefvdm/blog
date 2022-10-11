<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Enums\Status;
use App\Services\Seo;
use App\Models\Category;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::whereStatus(Status::PUBLISHED)->latest()->get();

        return view('blog.index', compact('posts'));
    }

    public function show(Category $category, Post $post)
    {        
        $seo = Seo::page($post);

        return view('blog.post.show', compact('post', 'seo'));
    }

}
