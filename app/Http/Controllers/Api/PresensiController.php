<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{PresensiMhs, PresensiDsn, KelasMhs, KelasMk, User};

class PresensiController extends Controller
{
    // Membuat pertemuan baru (dipanggil oleh service dosen)
    public function createPertemuan(Request $request)
    {
        $request->validate([
            'pertemuan_ke' => 'required|tinyInteger',
            'id_kelas_mk'  => 'required|integer',
            'id_pegawai'   => 'required|integer',
            'tanggal'      => 'required|date',
        ]);

        // Simpan presensi dosen
        $pertemuan = PresensiDsn::create([
            'pertemuan_ke'   => $request->pertemuan_ke,
            'id_kelas_mk'    => $request->id_kelas_mk,
            'id_pegawai'     => $request->id_pegawai,
            'tanggal'        => $request->tanggal,
            'waktu_presensi' => now(),
        ]);

        // Ambil id_kelas dari kelas_mk
        $kelasMk = KelasMk::findOrFail($request->id_kelas_mk);
        $id_kelas = $kelasMk->id_kelas;

        // Ambil mahasiswa yang terdaftar di kelas tersebut
        $kelasMahasiswa = KelasMhs::where('id_kelas', $id_kelas)->get();

        foreach ($kelasMahasiswa as $mhs) {
            PresensiMhs::create([
                'id_presensi_dsn' => $pertemuan->id,
                'id_kelas_mhs'    => $mhs->id,
                'tanggal'         => $request->tanggal,
                'status'          => 'A',
                'waktu_presensi'  => null,
                'nama_mhs'        => $mhs->nama,
                'nim'             => $mhs->nim,
            ]);
        }

        return response()->json([
            'message' => 'Pertemuan dan presensi berhasil dibuat',
            'id_presensi_dsn' => $pertemuan->id,
        ], 201);
    }

    // Melihat rekap presensi (dipanggil oleh dosen dan admin)
    public function rekapPresensi($id_presensi_dsn)
    {
        $presensi = PresensiMhs::where('id_presensi_dsn', $id_presensi_dsn)
            ->with('kelasMahasiswa')
            ->get();

        return response()->json($presensi);
    }

    // Memperbarui status presensi mahasiswa (dipanggil oleh dosen)
    public function updatePresensi(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:H,S,I,A',
        ]);

        $presensi = PresensiMhs::findOrFail($id);

        if (is_null($presensi->waktu_presensi)) {
            $presensi->waktu_presensi = now();
        }

        $presensi->status = $request->status;
        $presensi->save();

        return response()->json([
            'message' => 'Status presensi berhasil diperbarui',
            'data' => $presensi,
        ]);
    }

    // Melihat daftar pertemuan (dipanggil oleh mahasiswa)
    public function daftarPertemuan($id_kelas_mk)
    {
        if (!KelasMk::where('id', $id_kelas_mk)->exists()) {
            return response()->json(['message' => 'Kelas mata kuliah tidak ditemukan'], 404);
        }

        $pertemuanList = PresensiDsn::where('id_kelas_mk', $id_kelas_mk)
            ->with('kelasMk')
            ->orderBy('tanggal', 'desc')
            ->get();

        foreach ($pertemuanList as $pertemuan) {
            $pegawai = User::where('id', $pertemuan->id_pegawai)->first();
            $pertemuan->pegawai = [
                'id' => $pegawai->id,
                'name' => $pegawai->name,
                'email' => $pegawai->email,
            ];
        }

        return response()->json([
            'message' => 'Daftar pertemuan berhasil diambil',
            'data' => $pertemuanList,
        ]);
    }

    public function daftarPresensiMahasiswa($id_kelas_mk)
    {
        if (!KelasMk::where('id', $id_kelas_mk)->exists()) {
            return response()->json(['message' => 'Kelas mata kuliah tidak ditemukan'], 404);
        }

        $presensiList = PresensiMhs::whereHas('kelasMk', function ($query) use ($id_kelas_mk) {
            $query->where('id', $id_kelas_mk);
        })->with(['kelasMhs', 'presensiDsn.kelasMk'])
            ->orderBy('tanggal', 'desc')
            ->get();

        return response()->json([
            'message' => 'Daftar presensi mahasiswa berhasil diambil',
            'data' => $presensiList,
        ]);
    }
}
