<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.

use App\Models\Category;
use App\Models\Post;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use App\Services\Settings;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push(Settings::blogTitle(), route('home'));
});

Breadcrumbs::for('category', function (BreadcrumbTrail $trail, Category $category) {
    $trail->parent('home');

    $trail->push($category->title, route('category', $category));
});

Breadcrumbs::for('post', function (BreadcrumbTrail $trail, Category $category, Post $post) {
    $trail->parent('home');    
        
    $trail->push($category->title, route('category', $category));
    
    $trail->push($post->title, route('category', $category));
});

