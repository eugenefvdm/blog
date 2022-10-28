<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        // Generate three or so random words with a dot
        $title1 = $faker->word;
        $title2 = $faker->word;
        $title3 = $faker->word;

        Category::create([
            'title' => $title1,
            'slug' => Str::slug($title1),
            'description' => $faker->paragraph,
        ]);

        Category::create([
            'title' => $title2,
            'slug' => Str::slug($title2),
            'description' => $faker->paragraph,
        ]);

        Category::create([
            'title' => $title3,
            'slug' => Str::slug($title3),
            'description' => $faker->paragraph,
        ]);
    }
}
