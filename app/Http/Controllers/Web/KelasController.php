<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Http\Controllers\Controller;

class KelasController extends Controller
{
    public function index()
    {
        return response()->json(Kelas::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $data = Kelas::create($validated);

        return response()->json(['message' => 'Kelas created successfully.', 'data' => $data], 201);
    }

    public function update(Request $request, $id)
    {
        $data = Kelas::find($id);

        if (! $data) {
            return response()->json(['message' => 'Kelas not found.'], 404);
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $data->update($validated);

        return response()->json(['message' => 'Kelas updated successfully.', 'data' => $data]);
    }

    public function destroy($id)
    {
        $data = Kelas::find($id);

        if (! $data) {
            return response()->json(['message' => 'Kelas not found.'], 404);
        }

        $data->delete();

        return response()->json(['message' => 'Kelas deleted successfully.']);
    }
}
