<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kurikulum;

class KurikulumController extends Controller
{
    public function index()
    {
        return response()->json(Kurikulum::all());
    }

    public function show($id)
    {
        $data = Kurikulum::find($id);

        if (! $data) {
            return response()->json(['message' => 'Data Kurikulum Tidak Ditemukan.'], 404);
        }

        return response()->json($data);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_matkul' => 'required|smallInteger|exists:matkul,id',
            'id_tahun_akd' => 'required|char|5|exists:tahun_akademik,id',
            'id_prodi' => 'required|integer|exists:prodi,id',
            'nama' => 'required|string|max:100',
        ]);

        $data = Kurikulum::create($validated);

        return response()->json(['message' => 'Data Kurikulum Berhasil Dibuat.', 'data' => $data], 201);
    }

    public function update(Request $request, $id)
    {
        $data = Kurikulum::find($id);

        if (! $data) {
            return response()->json(['message' => 'Data Kurikulum Tidak Ditemukan.'], 404);
        }

        $validated = $request->validate([
            'id_tahun_akd' => 'required|char|5|exists:tahun_akademik,id',
            'nama' => 'required|string|max:100',
            'id_matkul' => 'required|smallInteger|exists:matkul,id',
            'id_prodi' => 'required|integer|exists:prodi,id',
        ]);

        $data->update($validated);

        return response()->json(['message' => 'Data Kurikulum Berhasil Diperbarui.', 'data' => $data]);
    }

    public function destroy($id)
    {
        $data = Kurikulum::find($id);

        if (! $data) {
            return response()->json(['message' => 'Data Kurikulum Tidak Ditemukan.'], 404);
        }

        $data->delete();

        return response()->json(['message' => 'Data Kurikulum Berhasil Dihapus.']);
    }
}
