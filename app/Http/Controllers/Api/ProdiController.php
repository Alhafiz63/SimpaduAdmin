<?php

namespace App\Http\Controllers\Api;

use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdiController extends Controller
{
    // GET /prodi
    public function index()
    {
        return response()->json(Prodi::all());
    }

    // GET /prodi/{id}
    public function show($id)
    {
        $prodi = Prodi::find($id);

        if (! $prodi) {
            return response()->json(['message' => 'Data Prodi Tidak Ditemukan.'], 404);
        }

        return response()->json($prodi);
    }

    // POST /prodi/create
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_jurusan' => 'required|tinyInteger|exists:jurusan,id',
            'nama' => 'required|string|max:100',
        ]);

        $prodi = Prodi::create($validated);

        return response()->json([
            'message' => 'Data Prodi Berhasil Dibuat.',
            'data' => $prodi
        ], 201);
    }

    // PUT /prodi/{id}
    public function update(Request $request, $id)
    {
        $prodi = Prodi::find($id);

        if (! $prodi) {
            return response()->json(['message' => 'Data Prodi Tidak Ditemukan.'], 404);
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:100',
        ]);

        $prodi->update($validated);

        return response()->json([
            'message' => 'Data Prodi Berhasil Diperbarui.',
            'data' => $prodi
        ]);
    }

    //Delete /prodi/{id}
    public function destroy($id)
     {
    $prodi = Prodi::find($id);

    if (! $prodi) {
        return response()->json(['message' => 'Data Prodi Tidak Ditemukan.'], 404);
    }

    $prodi->delete();

    return response()->json(['message' => 'Data Prodi Berhasil Dihapus.']);
    }
}
