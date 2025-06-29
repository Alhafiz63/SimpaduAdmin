<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\PresensiMhs;
use App\Http\Controllers\Controller;

class PresensiMhsController extends Controller
{
    public function index()
    {
        return response()->json(PresensiMhs::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $data = PresensiMhs::create($validated);

        return response()->json(['message' => 'PresensiMhs created successfully.', 'data' => $data], 201);
    }

    public function update(Request $request, $id)
    {
        $data = PresensiMhs::find($id);

        if (! $data) {
            return response()->json(['message' => 'PresensiMhs not found.'], 404);
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $data->update($validated);

        return response()->json(['message' => 'PresensiMhs updated successfully.', 'data' => $data]);
    }

    public function destroy($id)
    {
        $data = PresensiMhs::find($id);

        if (! $data) {
            return response()->json(['message' => 'Presensi Mahasiswa not found.'], 404);
        }

        $data->delete();

        return response()->json(['message' => 'Presensi Mahasiswa deleted successfully.']);
    }
}
