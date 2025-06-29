<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Matkul;
use App\Http\Controllers\Controller;

class MatkulController extends Controller
{
    public function index()
    {
        return response()->json(Matkul::all());
    }

    public function show($id)
    {
        $data = Matkul::find($id);

        if (! $data) {
            return response()->json(['message' => 'Data Mata Kuliah Tidak Ditemukan.'], 404);
        }

        return response()->json($data);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_prodi' => 'required|integer|exists:prodi,id',
            'nama' => 'required|string|max:100',
            'sks' => 'required|integer|min:1|max:6',
            'semester' => 'required|tinyInteger|min:1|max:2',
        ]);

        $data = Matkul::create($validated);

        return response()->json(['message' => 'Data Mata Kuliah Berhasil Dibuat.', 'data' => $data], 201);
    }

    public function update(Request $request, $id)
    {
        $data = Matkul::find($id);

        if (! $data) {
            return response()->json(['message' => 'Data Mata Kuliah Tidak Ditemukan.'], 404);
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'sks' => 'required|integer|min:1|max:6',
            'semester' => 'required|tinyInteger|min:1|max:2',
        ]);

        $data->update($validated);

        return response()->json(['message' => 'Data Mata Kuliah Berhasil Diperbarui.', 'data' => $data]);
    }

    public function destroy($id)
    {
        $data = Matkul::find($id);

        if (! $data) {
            return response()->json(['message' => 'Data Mata Kuliah Tidak Ditemukan.'], 404);
        }

        $data->delete();

        return response()->json(['message' => 'Data Mata Kuliah Berhasil Dihapus.']);
    }
}