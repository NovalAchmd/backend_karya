<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class KaryaController extends Controller
{
    // Menampilkan daftar semua karya
    public function index()
    {
        $karyas = Karya::with(['biodata', 'kategori'])->get();
        return response()->json([
            'success' => true,
            'data' => $karyas
        ], 200);
    }

    // Menyimpan karya baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama_karya'   => 'required|string|max:255', // Validasi untuk nama_karya
            'nim_mhs'      => 'required|string|exists:biodata_mhs,nim_mhs',
            'desc_karya'   => 'required|string',
            'tahun_rilis'  => 'required|date_format:Y',
            'id_kategori'  => 'required|exists:kategori,id_kategori',
            'gambar_karya' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Memeriksa jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'errors' => false,
                'message' => $validator->errors()
            ], 400);
        }

        $karya = new Karya($request->all());

        // Upload gambar jika ada
        if ($request->hasFile('gambar_karya')) {
            $file = $request->file('gambar_karya');
        
            // Membuat nama file dengan hash dari waktu dan nama file asli
            $filename = md5(time() . $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
        
            // Memindahkan file ke folder publik 'images'
            $file->move(public_path('images'), $filename);
        
            // Menyimpan nama file yang telah di-hash ke dalam database
            $karya->gambar_karya = $filename;
        }

        $karya->save();

        return response()->json([
            'success' => true,
            'message' => 'Karya berhasil ditambahkan.',
            'data' => $karya
        ], 201);
    }

    // Menampilkan detail karya
    public function show($id_karya)
    {
        $karya = Karya::with(['biodata', 'kategori'])->findOrFail($id_karya);
        return response()->json([
            'success' => true,
            'data' => $karya
        ], 200);
    }

    // Mengupdate karya
    public function update(Request $request, $id_karya)
    {
        $request->validate([
            'nama_karya'   => 'sometimes|required|string|max:255', // Validasi untuk nama_karya jika ada
            'desc_karya'   => 'sometimes|required|string',
            'tahun_rilis'  => 'sometimes|required|date_format:Y',
            'id_kategori'  => 'sometimes|required|exists:kategori,id_kategori',
            'gambar_karya' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $karya = Karya::findOrFail($id_karya);
        $karya->fill($request->except('gambar_karya')); // Mengisi semua kecuali gambar_karya
    
        // Upload gambar jika ada
        if ($request->hasFile('gambar_karya')) {
            // Hapus gambar lama jika ada
            if ($karya->gambar_karya) {
                unlink(public_path('images/' . $karya->gambar_karya)); // Hapus file gambar lama
            }
            $file = $request->file('gambar_karya');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $karya->gambar_karya = $filename;
        }
    
        $karya->save();
    
        return response()->json([
            'success' => true,
            'message' => 'Karya berhasil diupdate.',
            'data' => $karya
        ], 200);
    }
    

    // Menghapus karya
    public function destroy($id_karya)
    {
        $karya = Karya::findOrFail($id_karya);
        if ($karya->gambar_karya) {
            unlink(public_path('images/' . $karya->gambar_karya)); // Hapus file gambar
        }
        $karya->delete();

        return response()->json([
            'success' => true,
            'message' => 'Karya berhasil dihapus.'
        ], 200);
    }
}
