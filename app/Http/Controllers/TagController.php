<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Services\Seo;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return view('blog.tags', compact('tags'));
    }

    public function show(Tag $tag)
    {
        $posts = Post::published()
            ->whereJsonContains('tags', $tag->title)->get();

        $seo = Seo::page($tag);

        return view('blog.tag.show', compact('tag', 'posts', 'seo'));
    }
}
