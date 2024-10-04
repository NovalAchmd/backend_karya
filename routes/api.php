<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BiodataMhsController;  
use Illuminate\Http\Request;


// Routes untuk Karya
Route::prefix('karya')->middleware('api')->group(function () {
    Route::get('/', [KaryaController::class, 'index']);         // Mendapatkan semua karya
    Route::post('/', [KaryaController::class, 'store']);        // Menyimpan karya baru
    Route::get('/{id_karya}', [KaryaController::class, 'show']); // Mendapatkan detail karya
    Route::put('/{id_karya}', [KaryaController::class, 'update']); // Mengupdate karya
    Route::delete('/{id_karya}', [KaryaController::class, 'destroy']); // Menghapus karya
});


// Routes untuk Biodata Mahasiswa
Route::prefix('biodata')->middleware('api')->group(function () {
    Route::post('/create-biodata', [BiodataMhsController::class, 'store']);  // Menyimpan biodata baru
    Route::get('/', [BiodataMhsController::class, 'index']);                 // Mendapatkan semua biodata
    Route::get('/{nim_mhs}', [BiodataMhsController::class, 'show']);         // Mendapatkan detail biodata
    Route::put('/{nim_mhs}', [BiodataMhsController::class, 'update']);       // Mengupdate biodata
    Route::delete('/{nim_mhs}', [BiodataMhsController::class, 'destroy']);   // Menghapus biodata
});
// Routes untuk Kategori
Route::prefix('kategori')->middleware('api')->group(function () {
    Route::post('/create-kategori', [KategoriController::class, 'store']);  // Menyimpan kategori baru
    Route::get('/', [KategoriController::class, 'index']);                  // Mendapatkan semua kategori
    Route::get('/{id_kategori}', [KategoriController::class, 'show']);      // Mendapatkan detail kategori
    Route::put('/{id_kategori}', [KategoriController::class, 'update']);    // Mengupdate kategori
    Route::delete('/{id_kategori}', [KategoriController::class, 'destroy']); // Menghapus kategori
});

use App\Http\Controllers\UserController;

// Routes untuk User
Route::prefix('users')->middleware('api')->group(function () {
    Route::post('/', [UserController::class, 'store']);  // Menyimpan pengguna baru
    Route::get('/', [UserController::class, 'index']);    // Mendapatkan semua pengguna
    Route::get('/{username}', [UserController::class, 'show']); // Mendapatkan detail pengguna
    Route::put('/{username}', [UserController::class, 'update']); // Mengupdate pengguna
    Route::delete('/{username}', [UserController::class, 'destroy']); // Menghapus pengguna
});
