<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Services\Settings;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push(Settings::blogTitle(), route('home'));
});

Breadcrumbs::for('blog.category', function (BreadcrumbTrail $trail, Category $category) {
    $trail->parent('home');
    
    $trail->push($category->title, route('blog.category', $category));
});

Breadcrumbs::for('blog.tag', function (BreadcrumbTrail $trail, Tag $tag) {
    $trail->parent('home');

    $trail->push($tag->title, route('blog.tag', $tag));
});

Breadcrumbs::for('blog.post.show', function (BreadcrumbTrail $trail, Category $category, Post $post) {
    $trail->parent('home');

    $trail->push($category->title, route('blog.category', $category));

    $trail->push($post->title, route('blog.category', $category));
});
