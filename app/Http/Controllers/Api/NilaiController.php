<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Nilai;

class NilaiController extends Controller
{
    public function index()
    {
        return response()->json(Nilai::all());
    }

    public function show($id)
    {
        $data = Nilai::find($id);

        if (! $data) {
            return response()->json(['message' => 'Data Nilai Tidak Ditemukan.'], 404);
        }

        return response()->json($data);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_kelas_mk' => 'required|integer|exists:kelas_mk,id',
            'id_kelas_mhs' => 'required|bigInteger|exists:kelas_mhs,id',
            'n_angka' => 'required|decimal',
            'n_huruf' => 'required|string|max:2',
        ]);

        $data = Nilai::create($validated);

        return response()->json(['message' => 'Data Nilai Berhasil Dibuat.', 'data' => $data], 201);
    }

    public function update(Request $request, $id)
    {
        $data = Nilai::find($id);

        if (! $data) {
            return response()->json(['message' => 'Data Nilai Tidak Ditemukan.'], 404);
        }

        $validated = $request->validate([
            'id_kelas_mk' => 'required|integer|exists:kelas_mk,id',
            'id_kelas_mhs' => 'required|bigInteger|exists:kelas_mhs,id',
            'n_angka' => 'required|decimal',
            'n_huruf' => 'required|string|max:2',
        ]);

        $data->update($validated);

        return response()->json(['message' => 'Data Nilai Berhasil Diperbarui.', 'data' => $data]);
    }

    public function destroy($id)
    {
        $data = Nilai::find($id);

        if (! $data) {
            return response()->json(['message' => 'Data Nilai Tidak Ditemukan.'], 404);
        }

        $data->delete();

        return response()->json(['message' => 'Data Nilai Berhasil Dihapus.']);
    }
}
