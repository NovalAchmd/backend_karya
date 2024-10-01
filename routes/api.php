<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BiodataMhsController;

// Routes untuk Karya
Route::prefix('karya')->middleware('api')->group(function () {
    Route::get('/', [KaryaController::class, 'index']);         // Mendapatkan semua karya
    Route::post('/', [KaryaController::class, 'store']);        // Menyimpan karya baru
    Route::get('/{id_karya}', [KaryaController::class, 'show']); // Mendapatkan detail karya
    Route::put('/{id_karya}', [KaryaController::class, 'update']); // Mengupdate karya
    Route::delete('/{id_karya}', [KaryaController::class, 'destroy']); // Menghapus karya
});

// Routes untuk Kategori
Route::prefix('kategori')->middleware('api')->group(function () {
    Route::get('/', [KategoriController::class, 'index']);        // Mendapatkan semua kategori
    Route::post('/', [KategoriController::class, 'store']);       // Menyimpan kategori baru
    Route::get('/{id_kategori}', [KategoriController::class, 'show']); // Mendapatkan detail kategori
    Route::put('/{id_kategori}', [KategoriController::class, 'update']); // Mengupdate kategori
    Route::delete('/{id_kategori}', [KategoriController::class, 'destroy']); // Menghapus kategori
});

// Routes untuk Biodata Mahasiswa
Route::prefix('biodata')->middleware('api')->group(function () {
    Route::get('/', [BiodataMhsController::class, 'index']);      // Mendapatkan semua biodata
    Route::post('/', [BiodataMhsController::class, 'store']);     // Menyimpan biodata baru
    Route::get('/{nim_mhs}', [BiodataMhsController::class, 'show']); // Mendapatkan detail biodata
    Route::put('/{nim_mhs}', [BiodataMhsController::class, 'update']); // Mengupdate biodata
    Route::delete('/{nim_mhs}', [BiodataMhsController::class, 'destroy']); // Menghapus biodata
});
