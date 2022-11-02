<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);

        $this->call(CategorySeeder::class);
        Tag::factory()->count(3)->create();

        $dispatcher = Post::getEventDispatcher();
        // Remove Dispatcher
        Post::unsetEventDispatcher();

        // Do stuff here that should be exempt from model observers
        $this->call(PostSeeder::class);

        // Re-add Dispatcher
        Post::setEventDispatcher($dispatcher);
    }
}
