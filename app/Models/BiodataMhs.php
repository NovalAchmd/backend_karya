<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataMhs extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan konvensi
    protected $table = 'biodata_mhs';

    // Tentukan kolom yang bisa diisi massal
    protected $fillable = [
        'nim_mhs',
        'nama_mhs',
        'prodi',
        'jurusan',
        'email',
        'no_hp',
    ];
    // Tentukan primary key
    protected $primaryKey = 'nim_mhs';
    
    // Jika nim_mhs bkn integer
    public $incrementing = false;

    // Jika nim_mhs adalah string, 
    protected $keyType = 'string';
}

