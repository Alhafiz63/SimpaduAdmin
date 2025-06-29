<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    /**
     * Menampilkan halaman pendaftaran.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('superadmin.registrasi.index'); // Ganti 'register' dengan nama view yang sesuai
    }

    /**
     * Menangani pendaftaran pengguna baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string|in:Super Admin,Admin Akademik,Admin Prodi,Admin Pegawai,Dosen,Mahasiswa',
            'password' => 'required|string|min:8|confirmed',
            'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/',
        ], [
        // Pesan custom untuk password
        'password.regex' => 'Password harus mengandung huruf besar, huruf kecil, angka, dan simbol.',]
    );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Buat pengguna baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role, // Atur role sesuai kebutuhan
            'password' => Hash::make($request->password),
        ]);
        return back()->with('success', 'Data berhasil disimpan!');
    }
}
