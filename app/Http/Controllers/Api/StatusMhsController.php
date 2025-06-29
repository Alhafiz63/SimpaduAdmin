<?php

namespace App\Http\Controllers\Api;

use App\Models\StatusMhs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatusMhsController extends Controller
{
    public function index()
    {
        return response()->json(StatusMhs::all());
    }

    public function show($id)
    {
        $statusMhs = StatusMhs::find($id);

        if (! $statusMhs) {
            return response()->json(['message' => 'Status Mahasiswa Tidak Ditemukan.'], 404);
        }

        return response()->json($statusMhs);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:10',
        ]);

        $statusMhs = StatusMhs::create($validated);

        return response()->json(['message' => 'Status Mahasiswa Berhasil Dibuat.', 'data' => $statusMhs], 201);
    }

    public function update(Request $request, $id)
    {
        $statusMhs = StatusMhs::find($id);

        if (! $statusMhs) {
            return response()->json(['message' => 'Status Mahasiswa Tidak Ditemukan.'], 404);
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:10',
        ]);

        $statusMhs->update($validated);

        return response()->json(['message' => 'Status Mahasiswa Berhasil Diperbarui.', 'data' => $statusMhs]);
    }

    public function destroy($id)
    {
        $statusMhs = StatusMhs::find($id);

        if (! $statusMhs) {
            return response()->json(['message' => 'Status Mahasiswa Tidak Ditemukan.'], 404);
        }

        $statusMhs->delete();

        return response()->json(['message' => 'Status Mahasiswa Berhasil Dihapus.']);
    }
}
