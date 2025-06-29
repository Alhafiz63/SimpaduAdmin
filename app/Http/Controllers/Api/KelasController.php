<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Http\Controllers\Controller;

class KelasController extends Controller
{
    public function index()
    {
        return response()->json(Kelas::all());
    }

    public function show($id)
    {
        $data = Kelas::find($id);

        if (! $data) {
            return response()->json(['message' => 'Data Kelas Tidak Ditemukan.'], 404);
        }

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_tahun_akd' => 'required|char|5|exists:tahun_akademik,id',
            'id_prodi' => 'required|integer|exists:prodi,id',
            'nama' => 'required|string|max:50',
        ]);

        $data = Kelas::create($validated);

        return response()->json(['message' => 'Kelas created successfully.', 'data' => $data], 201);
    }

    public function update(Request $request, $id)
    {
        $data = Kelas::find($id);

        if (! $data) {
            return response()->json(['message' => 'Data Kelas Tidak Ditemukan.'], 404);
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:50',
        ]);

        $data->update($validated);

        return response()->json(['message' => 'Data Kelas Berhasil Diperbarui.', 'data' => $data]);
    }

    public function destroy($id)
    {
        $data = Kelas::find($id);

        if (! $data) {
            return response()->json(['message' => 'Data Kelas Tidak Ditemukan.'], 404);
        }

        $data->delete();

        return response()->json(['message' => 'Data Kelas Berhasil Dihapus.']);
    }
}
