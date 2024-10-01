<?php

namespace App\Http\Controllers;

use App\Models\BiodataMhs;
use Illuminate\Http\Request;

class BiodataMhsController extends Controller
{
    // Menampilkan daftar semua biodata
    public function index()
    {
        $biodatas = BiodataMhs::all();
        return response()->json([
            'success' => true,
            'data' => $biodatas
        ], 200);
    }

    // Menyimpan biodata baru
    public function store(Request $request)
    {
        $request->validate([
            'nim_mhs' => 'required|string|unique:biodata_mhs',
            'nama_mhs' => 'required|string',
            'prodi' => 'required|string',
            'jurusan' => 'required|string',
            'email' => 'required|email|unique:biodata_mhs',
            'no_hp' => 'required|string',
        ]);

        $biodata = BiodataMhs::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Biodata berhasil ditambahkan.',
            'data' => $biodata
        ], 201);
    }

    // Menampilkan detail biodata
    public function show($nim_mhs)
    {
        $biodata = BiodataMhs::findOrFail($nim_mhs);

        return response()->json([
            'success' => true,
            'data' => $biodata
        ], 200);
    }

    // Mengupdate biodata
    public function update(Request $request, $nim_mhs)
    {
        $request->validate([
            'nama_mhs' => 'required|string',
            'prodi' => 'required|string',
            'jurusan' => 'required|string',
            'email' => 'required|email|unique:biodata_mhs,email,' . $nim_mhs . ',nim_mhs',
            'no_hp' => 'required|string',
        ]);

        $biodata = BiodataMhs::findOrFail($nim_mhs);
        $biodata->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Biodata berhasil diupdate.',
            'data' => $biodata
        ], 200);
    }

    // Menghapus biodata
    public function destroy($nim_mhs)
    {
        $biodata = BiodataMhs::findOrFail($nim_mhs);
        $biodata->delete();

        return response()->json([
            'success' => true,
            'message' => 'Biodata berhasil dihapus.'
        ], 200);
    }
}
