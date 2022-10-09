<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Disable the event dispatcher before creation as Auth:: calls will be empty.
     *
     * @return void
     */
    public function run()
    {        
        $faker = Factory::create();

        Post::create([
            'user_id' => 1,
            'category_id' => 2,
            'title' => 'How to choose the right estate agent',
            'slug' => 'how-to-choose-the-right-estate-agent',
            'body' => $faker->paragraph(5),            
        ]);

        Post::create([
            'user_id' => 2,
            'category_id' => 3,
            'title' => 'Tips for selling your property',
            'slug' => 'tips-for-selling-your-property',
            'body' => $faker->paragraph(5),
        ]);

        Post::create([
            'user_id' => 3,
            'category_id' => 3,
            'title' => 'Tips for buying a new property',
            'slug' => 'tips-for-buying-a-new-property',
            'body' => $faker->paragraph(5),
        ]);        
    }
}
