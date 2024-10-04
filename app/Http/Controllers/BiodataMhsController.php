<?php

namespace App\Http\Controllers;

use App\Models\BiodataMhs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
        $validator = Validator::make($request->all(),[
            'nim_mhs' => 'required|string|unique:biodata_mhs',
            'nama_mhs' => 'required|string',
            'prodi' => 'required|string',
            'jurusan' => 'required|string',
            'email' => 'required|email|unique:biodata_mhs',
            'no_hp' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 400);
        }

        $data = $request->all();

        // Cek jika ada file foto yang diunggah
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/foto', $filename, 'public');
            $data['foto'] = $filePath; // Menyimpan path foto ke dalam data
        }

        $biodatas = BiodataMhs::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Biodata berhasil ditambahkan.',
            'data' => $biodatas
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
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk foto
        ]);

        $biodata = BiodataMhs::findOrFail($nim_mhs);
        $data = $request->all();

        // Jika ada file foto baru yang diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($biodata->foto) {
                Storage::disk('public')->delete($biodata->foto);
            }

            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/foto', $filename, 'public');
            $data['foto'] = $filePath; // Menyimpan path foto yang baru
        }

        $biodata->update($data);

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

        // Hapus foto jika ada sebelum menghapus biodata
        if ($biodata->foto) {
            Storage::disk('public')->delete($biodata->foto);
        }

        $biodata->delete();

        return response()->json([
            'success' => true,
            'message' => 'Biodata berhasil dihapus.'
        ], 200);
    }
}

