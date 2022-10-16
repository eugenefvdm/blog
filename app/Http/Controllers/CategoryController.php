<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('blog.categories', compact('categories'));
    }

    public function show(Category $category)
    {
        $seo = $category->seo;

        $posts = $category->posts;
        
        return view('blog.category.show', compact('category','seo', 'posts'));
    }
}
