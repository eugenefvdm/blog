<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return view('blog.tags', compact('tags'));
    }

    public function show(Tag $tag)
    {
        $seo = $tag->seo;

        $posts = Post::published()
            ->whereJsonContains('tags', $tag->title)->get();
        
        return view('blog.tag.show', compact('tag', 'seo', 'posts'));
    }
}
