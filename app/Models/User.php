<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\Guard;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
class User extends Model
{
    use HasFactory;
    use HasApiTokens, Notifiable;

    // Tentukan nama tabel jika tidak mengikuti konvensi penamaan
    protected $table = 'users';

    // Tentukan primary key
    protected $primaryKey = 'username';

    // Tentukan apakah primary key adalah auto-incrementing

    // Tentukan atribut yang dapat diisi (fillable)
    protected $fillable = [
        'username',
        'password',
        'email',
    ];
    

    // Tidak perlu menambahkan relasi untuk sekarang, tetapi bisa ditambahkan jika ada relasi lain.
}
