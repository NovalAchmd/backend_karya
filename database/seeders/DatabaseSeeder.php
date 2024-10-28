<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Import Hash Facade
use App\Models\User; // Make sure to import your User model

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // User::factory(10)->create(); // Uncomment if you want to create 10 users

        User::factory()->create([
            'username' => 'adminkarya',
            'password' => Hash::make('karya456'), // Encrypt the password        
            'email' => 'karya@gmail.com',
        ]);
    }
}
