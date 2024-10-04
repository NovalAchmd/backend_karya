<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak mengikuti konvensi penamaan
    protected $table = 'kategori';

    // Tentukan atribut yang dapat diisi (fillable)
    protected $fillable = [
        'jenis_karya', // Pastikan ini sesuai dengan kolom di database
    ];

    // Tentukan kunci utama jika tidak menggunakan id
    protected $primaryKey = 'id_kategori'; // Jika 'id_kategori' adalah kunci utama

    // Tentukan tipe primary key
    protected $keyType = 'int'; // Jika id_kategori adalah integer

    // Relasi dengan model Karya
    public function karya()
    {
        return $this->hasMany(Karya::class, 'id_kategori', 'id_kategori'); // Pastikan ini juga sesuai
    }
}
