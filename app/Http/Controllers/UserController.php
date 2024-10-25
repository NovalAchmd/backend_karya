<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Menampilkan daftar semua pengguna
    public function index()
    {
        $users = User::all();
        return response()->json([
            'success' => true,
            'data' => $users
        ], 200);
    }

    // Menyimpan pengguna baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|max:255|unique:users', // Unique username
            'password' => 'required|string|min:8', // Minimal 8 karakter
            'email' => 'required|string|email|max:255|unique:users', // Unique email
        ]);

        // Membuat pengguna baru
        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password), // Enkripsi password
            'email' => $request->email,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pengguna berhasil ditambahkan.',
            'data' => $user
        ], 201);
    }

    // Menampilkan detail pengguna
    public function show($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);
    }

   // Mengupdate pengguna
   public function update(Request $request, $username)
{
    // Validasi input
    $request->validate([
        'email' => 'required|string|email|max:255|unique:users,email,' . $username . ',username', // Menyesuaikan primary key
        'password' => 'nullable|string|min:8', // Minimal 8 karakter, tidak wajib
    ]);

    // Mengambil pengguna berdasarkan username
    $user = User::where('username', $username)->firstOrFail();

    // Update email jika ada
    if ($request->filled('email')) {
        $user->email = $request->email;
    }

    // Update password jika ada
    if ($request->filled('password')) {
        $user->password = bcrypt($request->password); // Enkripsi password
    }

    // Simpan perubahan
    $user->save();

    return response()->json([
        'success' => true,
        'message' => 'Pengguna berhasil diupdate.',
        'data' => $user
    ], 200);
}



    // Menghapus pengguna
    public function destroy($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pengguna berhasil dihapus.'
        ], 200);
    }
}
