<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users', // Unique username
            'password' => 'required|string|min:8', // Minimal 8 karakter
            'email' => 'required|string|email|max:255|unique:users', // Unique email
        ]);

        // Memeriksa jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 400);
        }

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
        $user = User::findOrFail($username);
        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);
    }

    // Mengupdate pengguna
    public function update(Request $request, $username)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users,email,' . $username, // Unique email, kecuali untuk yang sudah ada
            'password' => 'nullable|string|min:8', // Minimal 8 karakter, tidak wajib
        ]);

        // Memeriksa jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 400);
        }

        $user = User::findOrFail($username);
        
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password); // Enkripsi password
        }

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
        $user = User::findOrFail($username);
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pengguna berhasil dihapus.'
        ], 200);
    }
}
