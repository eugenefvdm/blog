<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Services\Seo;
use App\Services\Settings;
use App\Settings\BlogSettings;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::published()->with('tags')->get();

        if (Settings::homePageLayout() == 'grid') {
            return view('blog.grid-index', compact('posts'));
        }
        
        return view('blog.index', compact('posts'));        
    }

    public function show(Category $category, Post $post)
    {
        $seo = Seo::page($post);

        return view('blog.post.show', compact('post', 'seo'));
    }
}
