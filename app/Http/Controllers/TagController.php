<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Services\Seo;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return view('blog.tag.index', compact('tags'));
    }

    public function show(Tag $tag)
    {
        $posts = $tag->posts;

        $seo = Seo::page($tag);

        return view('blog.tag.show', compact('tag', 'posts', 'seo'));
    }
}
