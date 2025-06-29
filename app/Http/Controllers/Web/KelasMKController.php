<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\KelasMk;
use App\Http\Controllers\Controller;

class KelasMkController extends Controller
{
    public function index()
    {
        return response()->json(KelasMk::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $data = KelasMk::create($validated);

        return response()->json(['message' => 'KelasMk created successfully.', 'data' => $data], 201);
    }

    public function update(Request $request, $id)
    {
        $data = KelasMk::find($id);

        if (! $data) {
            return response()->json(['message' => 'KelasMk not found.'], 404);
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $data->update($validated);

        return response()->json(['message' => 'KelasMk updated successfully.', 'data' => $data]);
    }

    public function destroy($id)
    {
        $data = KelasMk::find($id);

        if (! $data) {
            return response()->json(['message' => 'KelasMk not found.'], 404);
        }

        $data->delete();

        return response()->json(['message' => 'KelasMk deleted successfully.']);
    }
}
