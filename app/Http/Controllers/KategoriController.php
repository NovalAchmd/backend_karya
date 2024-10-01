<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Menampilkan daftar semua kategori
    public function index()
    {
        $kategoris = Kategori::all();
        return response()->json([
            'success' => true,
            'data' => $kategoris
        ], 200);
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'jenis_karya' => 'required|string|max:255',
        ]);

        // Membuat kategori baru
        $kategori = Kategori::create($request->only(['jenis_karya']));
        
        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil ditambahkan.',
            'data' => $kategori
        ], 201);
    }

    // Menampilkan detail kategori
    public function show($id_kategori)
    {
        $kategori = Kategori::findOrFail($id_kategori);
        return response()->json([
            'success' => true,
            'data' => $kategori
        ], 200);
    }

    // Mengupdate kategori
    public function update(Request $request, $id_kategori)
    {
        // Validasi input
        $request->validate([
            'jenis_karya' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id_kategori);
        $kategori->update($request->only(['jenis_karya']));

        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil diupdate.',
            'data' => $kategori
        ], 200);
    }

    // Menghapus kategori
    public function destroy($id_kategori)
    {
        $kategori = Kategori::findOrFail($id_kategori);
        $kategori->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil dihapus.'
        ], 200);
    }
}
