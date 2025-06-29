<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;


class AuthController extends Controller
{
    public function data()
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role,
        ]);
    }
    /**
     * Login API
     */
    public function login(Request $request)
    {
        // Validasi email dan password sesuai kriteria
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/',
            ],
        ], [
            'password.regex' => 'Password harus mengandung huruf besar, huruf kecil, angka, dan simbol.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        // Coba login
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = User::where('email', $request->email)->first();

            // Ambil platform dari header (default: web)
            $platform = $request->header('X-Platform', 'web');

            // Hapus token lama dari platform yang sama
            $user->tokens()->where('name', $platform)->delete();

            // Buat token baru dengan nama platform
            $token = $user->createToken($platform)->plainTextToken;

            $extra = [];

        if ($user->role === 'Dosen') {
            $kelasDosen = \App\Models\KelasMk::where('id_pegawai', $user->ref_id)->get();

            $extra['kelas_mk'] = $kelasDosen->map(function ($kmk) {
                return [
                    'id_kelas_mk'      => $kmk->id,
                    'mata_kuliah'      => $kmk->mata_kuliah,
                    'kelas'            => optional($kmk->kelas)->nama,
                    'jumlah_pertemuan' => \App\Models\PresensiDsn::where('id_kelas_mk', $kmk->id)->count(),
                ];
            });
        }

        if ($user->role === 'Mahasiswa') {
            $kelasMahasiswa = \App\Models\KelasMhs::where('nim', $user->ref_id)->get();

            $extra['kelas_mhs'] = $kelasMahasiswa->map(function ($km) {
                $rekap = \App\Models\PresensiMhs::where('id_kelas_mhs', $km->id)
                    ->selectRaw("status, COUNT(*) as total")
                    ->groupBy('status')
                    ->pluck('total', 'status');

                return [
                    'kelas'          => optional($km->kelas)->nama,
                    'mata_kuliah'    => optional($km->kelas->kelasMk)->mata_kuliah,
                    'rekap_presensi' => [
                        'H' => $rekap['H'] ?? 0,
                        'I' => $rekap['I'] ?? 0,
                        'S' => $rekap['S'] ?? 0,
                        'A' => $rekap['A'] ?? 0,
                    ]
                ];
            });
        }

        return response()->json([
            'message' => 'Login berhasil',
            'user' => [
                'id'      => $user->id,
                'name'    => $user->name,
                'email'   => $user->email,
                'role'    => $user->role,
                'ref_id'  => $user->ref_id,
            ],
            'platform' => $platform,
            'token'    => $token,
            'info'     => $extra,
        ]);
        }

        return response()->json([
            'message' => 'Email atau password salah'
        ], 401);
    }

    /**
     * Logout API
     */
    public function logout(Request $request)
    {
        $user = $request->user();

        $token = $user->currentAccessToken();

        if ($token) {
            $token->delete(); // hanya logout dari token yang sedang dipakai
        }

        return response()->json(['message' => 'Berhasil logout']);
    }
}
