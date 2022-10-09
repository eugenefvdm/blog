<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Eugene van der Merwe',
            'email' => 'eugene@vander.host',
            'password' => '$2y$10$j/7JJhjm87qGD/qtLmN5a.1ygUpbWe3nMU3.ci2PkwTL/GnzV019O',
        ]);

        User::create([
            'name' => 'Storm van der Merwe',
            'email' => 'storm@vander.host',
            'password' => '$2y$10$j/7JJhjm87qGD/qtLmN5a.1ygUpbWe3nMU3.ci2PkwTL/GnzV019O',
        ]);

        User::create([
            'name' => 'Elza van der Merwe',
            'email' => 'elza@vander.host',
            'password' => '$2y$10$j/7JJhjm87qGD/qtLmN5a.1ygUpbWe3nMU3.ci2PkwTL/GnzV019O',
        ]);
    }    
}
