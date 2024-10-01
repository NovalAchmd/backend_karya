<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiodataMhsController;
use App\Http\Controllers\KaryaController;
use App\Http\Controllers\KategoriController; 

// Rute untuk tampilan awal
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk BiodataMhsController
Route::resource('biodata', BiodataMhsController::class);

// Rute untuk KaryaController
Route::resource('karya', KaryaController::class);

// Rute untuk KategoriController
Route::resource('kategori', KategoriController::class);
