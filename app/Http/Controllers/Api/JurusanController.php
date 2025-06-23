<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    // GET /jurusan
    public function index()
    {
        return response()->json(Jurusan::all());
    }

    public function show($id)
    {
        $jurusan = Jurusan::find($id);
        if (! $jurusan) {
            return response()->json(['message' => 'Jurusan Belum Tersedia.'], 404);
        }
        return response()->json($jurusan);
    }

    // POST /jurusan/create
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $jurusan = Jurusan::create($validated);
        return response()->json([
            'message' => 'Jurusan Berhasil Dibuat.',
            'data' => $jurusan
        ], 201);
    }

    // PUT /jurusan/{id}
    public function update(Request $request, $id)
    {
        $jurusan = Jurusan::find($id);

        if (! $jurusan) {
            return response()->json(['message' => 'Jurusan Belum Tersedia.'], 404);
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $jurusan->update($validated);

        return response()->json([
            'message' => 'Data Jurusan Berhasil diubah.',
            'data' => $jurusan
        ]);
    }

    //Destroy /
public function destroy($id)
{
    $jurusan = Jurusan::find($id);

    if (! $jurusan) {
        return response()->json(['message' => 'Jurusan Belum Tersedia.'], 404);
    }

    $jurusan->delete();

    return response()->json(['message' => 'Jurusan Berhasil Dihapus.']);
}
}
