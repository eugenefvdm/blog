<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Services\Seo;
use App\Services\TagCloud;

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

    public function cloud() {
        $tags = Tag::join('post_tag as pt', 'pt.tag_id', '=', 'id')
        ->selectRaw('title, slug, count(title) as count')
        ->groupBy('title', 'slug')        
        ->get();
        
        $htmlTags = new TagCloud();
        
        // Now get the newest article
        foreach($tags as $tag) {
            $htmlTags->addElement($tag->title,$tag->slug, $tag->count);
        }

        echo $htmlTags->buildALL();        
    }
}
