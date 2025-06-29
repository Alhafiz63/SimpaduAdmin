<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\KelasMhs;
use App\Http\Controllers\Controller;

class KelasMhsController extends Controller
{
    public function index()
    {
        return response()->json(KelasMhs::all());
    }

    public function show($id)
    {
        $data = KelasMhs::find($id);

        if (! $data) {
            return response()->json(['message' => 'Data Kelas Mahasiswa Tidak Ditemukan.'], 404);
        }

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_kelas' => 'required|integer|exists:kelas,id',
            'no_absen' => 'required|tinyInteger|min:1|max:3',
            'nama' => 'required|string|max:100',
            'id_tahun_akd' => 'required|char|5|exists:tahun_akd,id',
        ]);

        $data = KelasMhs::create($validated);

        return response()->json(['message' => 'Data Kelas Mahasiswa Berhasil Dibuat', 'data' => $data], 201);
    }

    public function update(Request $request, $id)
    {
        $data = KelasMhs::find($id);

        if (! $data) {
            return response()->json(['message' => 'Data Kelas Mahasiswa Tidak Ditemukan.'], 404);
        }

        $validated = $request->validate([
            'id_kelas' => 'required|integer|exists:kelas,id',
            'no_absen' => 'required|tinyInteger|min:1|max:3',
            'nim' => 'required|char|10',
            'nama' => 'required|string|max:100',
            'id_status_mhs' => 'required|char|1|exists:status_mhs,id',
        ]);

        $data->update($validated);

        return response()->json(['message' => 'Data Kelas Mahasiswa Berhasil Diperbarui.', 'data' => $data]);
    }

    public function destroy($id)
    {
        $data = KelasMhs::find($id);

        if (! $data) {
            return response()->json(['message' => 'Data Kelas Mahasiswa Tidak Ditemukan.'], 404);
        }

        $data->delete();

        return response()->json(['message' => 'Data Kelas Mahasiswa Berhasil Dihapus.']);
    }
}
