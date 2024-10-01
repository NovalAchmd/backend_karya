<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak mengikuti konvensi penamaan
    protected $table = 'karya';

    // Tentukan primary key
    protected $primaryKey = 'id_karya';

    // Tentukan apakah primary key adalah auto-incrementing
    public $incrementing = false;

    // Tentukan atribut yang dapat diisi (fillable)
    protected $fillable = [
        'nim_mhs',
        'desc_karya',
        'tahun_rilis',
        'id_kategori', // Pastikan ini sesuai dengan kolom di database
        'gambar_karya',
    ];

    // Definisikan relasi dengan model BiodataMhs
    public function biodata()
    {
        return $this->belongsTo(BiodataMhs::class, 'nim_mhs', 'nim_mhs');
    }

    // Definisikan relasi dengan model Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}
