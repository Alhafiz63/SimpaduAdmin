<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Matkul;
use App\Http\Controllers\Controller;

class MatkulController extends Controller
{
    public function index()
    {
        return response()->json(Matkul::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $data = Matkul::create($validated);

        return response()->json(['message' => 'Matkul created successfully.', 'data' => $data], 201);
    }

    public function update(Request $request, $id)
    {
        $data = Matkul::find($id);

        if (! $data) {
            return response()->json(['message' => 'Matkul not found.'], 404);
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $data->update($validated);

        return response()->json(['message' => 'Matkul updated successfully.', 'data' => $data]);
    }

    public function destroy($id)
    {
        $data = Matkul::find($id);

        if (! $data) {
            return response()->json(['message' => 'Matkul not found.'], 404);
        }

        $data->delete();

        return response()->json(['message' => 'Matkul deleted successfully.']);
    }
}