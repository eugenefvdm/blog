<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'title' => 'Article',
            'slug' => 'article'
        ]);
        
        Category::create([
            'title' => 'Guides',
            'slug' => 'guide'
        ]);

        Category::create([
            'title' => 'Tips',
            'slug' => 'tips'
        ]);        
    }
}
