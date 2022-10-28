<?php

namespace App\Http\Controllers;

use App\Services\Seo;
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
        $posts = $category->posts;

        $seo = Seo::page($category);
                
        return view('blog.category.show', compact('category','posts', 'seo'));
    }
}
