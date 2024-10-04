<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak mengikuti konvensi penamaan
    protected $table = 'users';

    // Tentukan primary key
    protected $primaryKey = 'username';

    // Tentukan apakah primary key adalah auto-incrementing
    public $incrementing = false;

    // Tentukan atribut yang dapat diisi (fillable)
    protected $fillable = [
        'username',
        'password',
        'email',
    ];

    // Tidak perlu menambahkan relasi untuk sekarang, tetapi bisa ditambahkan jika ada relasi lain.
}
