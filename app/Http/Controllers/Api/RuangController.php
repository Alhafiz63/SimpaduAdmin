<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Ruang;
use App\Http\Controllers\Controller;

class RuangController extends Controller
{
    public function index()
    {
        return response()->json(Ruang::all());
    }

    public function show($id)
    {
        $data = Ruang::find($id);

        if (! $data) {
            return response()->json(['message' => 'Data Ruang Tidak Ditemukan.'], 404);
        }

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_prodi' => 'required|tinyInteger|exists:prodi,id',
            'nama_ruang' => 'required|string|max:100',
        ]);

        $data = Ruang::create($validated);

        return response()->json(['message' => 'Data Ruang Berhasil Dibuat.', 'data' => $data], 201);
    }

    public function update(Request $request, $id)
    {
        $data = Ruang::find($id);

        if (! $data) {
            return response()->json(['message' => 'Data Ruang Tidak Ditemukan.'], 404);
        }

        $validated = $request->validate([
            'nama_ruang' => 'required|string|max:100',
        ]);

        $data->update($validated);

        return response()->json(['message' => 'Data Ruang Berhasil Diperbarui.', 'data' => $data]);
    }

    public function destroy($id)
    {
        $data = Ruang::find($id);

        if (! $data) {
            return response()->json(['message' => 'Data Ruang Tidak Ditemukan.'], 404);
        }

        $data->delete();

        return response()->json(['message' => 'Data Ruang Berhasil Dihapus.']);
    }
}
