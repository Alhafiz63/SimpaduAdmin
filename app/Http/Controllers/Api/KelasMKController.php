<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\KelasMk;
use App\Http\Controllers\Controller;

class KelasMkController extends Controller
{
    public function index()
    {
        return response()->json(KelasMk::all());
    }

    public function show($id)
    {
        $data = KelasMk::find($id);

        if (! $data) {
            return response()->json(['message' => 'Data Kelas Mata Kuliah Tidak Ditemukan.'], 404);
        }

        return response()->json($data);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_kelas' => 'required|integer|exists:kelas,id',
            'id_kurikulum' => 'required|integer|exists:kurikulum,id',
            'id_pegawai' => 'required|integer',
            'nama' => 'required|string|max:100',
            'id_ruang' => 'required|integer|exists:ruang,id',
        ]);

        $data = KelasMk::create($validated);

        return response()->json(['message' => 'Data Kelas Mata Kuliah Berhasil Dibuat.', 'data' => $data], 201);
    }

    public function update(Request $request, $id)
    {
        $data = KelasMk::find($id);

        if (! $data) {
            return response()->json(['message' => 'Data Kelas Mata Kuliah Tidak Ditemukan.'], 404);
        }

        $validated = $request->validate([
            'id_pegawai' => 'required|integer',
            'nama' => 'required|string|max:100',
            'id_ruang' => 'required|integer|exists:ruang,id',
        ]);

        $data->update($validated);

        return response()->json(['message' => 'Data Kelas Mata Kuliah Berhasil Diperbarui.', 'data' => $data]);
    }

    public function destroy($id)
    {
        $data = KelasMk::find($id);

        if (! $data) {
            return response()->json(['message' => 'Data Kelas Mata Kuliah Tidak Ditemukan.'], 404);
        }

        $data->delete();

        return response()->json(['message' => 'Data Kelas Mata Kuliah Berhasil Dihapus.']);
    }
}
