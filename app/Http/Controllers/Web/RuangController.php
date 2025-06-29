<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Ruang;
use App\Http\Controllers\Controller;

class RuangController extends Controller
{
    public function index()
    {
        return response()->json(Ruang::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $data = Ruang::create($validated);

        return response()->json(['message' => 'Ruang created successfully.', 'data' => $data], 201);
    }

    public function update(Request $request, $id)
    {
        $data = Ruang::find($id);

        if (! $data) {
            return response()->json(['message' => 'Ruang not found.'], 404);
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $data->update($validated);

        return response()->json(['message' => 'Ruang updated successfully.', 'data' => $data]);
    }

    public function destroy($id)
    {
        $data = Ruang::find($id);

        if (! $data) {
            return response()->json(['message' => 'Ruang not found.'], 404);
        }

        $data->delete();

        return response()->json(['message' => 'Ruang deleted successfully.']);
    }
}
