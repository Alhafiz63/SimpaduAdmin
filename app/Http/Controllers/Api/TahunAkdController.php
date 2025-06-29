<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TahunAkd;
use Illuminate\Http\Request;

class TahunAkdController extends Controller
{
    public function index()
    {
        return response()->json(TahunAkd::all());
    }

    public function show($id)
    {
        $tahunAkademik = TahunAkd::find($id);

        if (! $tahunAkademik) {
            return response()->json(['message' => 'Tahun Akademik Tidak Ditemukan.'], 404);
        }

        return response()->json($tahunAkademik);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $tahunAkademik = TahunAkd::create($validated);

        return response()->json(['message' => 'Tahun Akademik Berhasil Dibuat.', 'data' => $tahunAkademik], 201);
    }

    public function update(Request $request, $id)
    {
        $tahunAkademik = TahunAkd::find($id);

        if (! $tahunAkademik) {
            return response()->json(['message' => 'Tahun Akademik Tidak Ditemukan.'], 404);
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:50',
        ]);

        $tahunAkademik->update($validated);

        return response()->json(['message' => 'Tahun Akademik Berhasil Diperbarui.', 'data' => $tahunAkademik]);
    }

    public function destroy($id)
    {
        $tahunAkademik = TahunAkd::find($id);

        if (! $tahunAkademik) {
            return response()->json(['message' => 'Tahun Akademik Tidak Ditemukan.'], 404);
        }

        $tahunAkademik->delete();

        return response()->json(['message' => 'Tahun Akademik Berhasil Dihapus.']);
    }
}
