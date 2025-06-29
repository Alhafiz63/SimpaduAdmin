<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\KelasMhs;
use App\Http\Controllers\Controller;

class KelasMhsController extends Controller
{
    public function index()
    {
        return response()->json(KelasMhs::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $data = KelasMhs::create($validated);

        return response()->json(['message' => 'KelasMhs created successfully.', 'data' => $data], 201);
    }

    public function update(Request $request, $id)
    {
        $data = KelasMhs::find($id);

        if (! $data) {
            return response()->json(['message' => 'KelasMhs not found.'], 404);
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $data->update($validated);

        return response()->json(['message' => 'KelasMhs updated successfully.', 'data' => $data]);
    }

    public function destroy($id)
    {
        $data = KelasMhs::find($id);

        if (! $data) {
            return response()->json(['message' => 'KelasMhs not found.'], 404);
        }

        $data->delete();

        return response()->json(['message' => 'KelasMhs deleted successfully.']);
    }
}
