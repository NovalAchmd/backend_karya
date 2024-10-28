<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    // Tentukan model yang terkait dengan factory ini
    protected $model = User::class;

    public function definition()
    {
        return [
            'username' => $this->faker->unique()->userName, // Membuat username unik
            'password' => Hash::make('password123'),        // Menggunakan password statis atau bisa juga $this->faker->password
            'email' => $this->faker->unique()->safeEmail,   // Membuat email unik
        ];
    }
}
