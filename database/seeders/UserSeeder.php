<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Tambahkan pengguna contoh
        $users = [
            [
                'username' => 'admin',
                'password' => Hash::make('admin123'), // Enkripsi password
                'email' => 'admin@gmail.com',
            ],
            [
                'username' => 'adminkarya',
                'password' => Hash::make('karya456'), // Enkripsi password
                'email' => 'karya@gmail.com',
            ],
        ];

        // Loop untuk menambahkan pengguna
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
