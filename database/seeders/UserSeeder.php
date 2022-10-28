<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        User::create([
            'name' => $faker->name(),
            'email' => 'user1@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => $faker->name(),
            'email' => 'user2@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => $faker->name(),
            'email' => 'user3@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
