<?php

namespace App\Http\Controllers\Web;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JurusanController extends Controller
{
    // GET /jurusan
    public function index()
    {
        return response()->json(Jurusan::all());
    }

    // POST /jurusan/create
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $jurusan = Jurusan::create($validated);

        return response()->json([
            'message' => 'Jurusan created successfully.',
            'data' => $jurusan
        ], 201);
    }

    // PUT /jurusan/{id}
    public function update(Request $request, $id)
    {
        $jurusan = Jurusan::find($id);

        if (! $jurusan) {
            return response()->json(['message' => 'Jurusan not found.'], 404);
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $jurusan->update($validated);

        return response()->json([
            'message' => 'Jurusan updated successfully.',
            'data' => $jurusan
        ]);
    }

    //Destroy /
 public function destroy($id)
{
    $jurusan = Jurusan::find($id);

    if (! $jurusan) {
        return response()->json(['message' => 'Jurusan not found.'], 404);
    }

    $jurusan->delete();

    return response()->json(['message' => 'Jurusan deleted successfully.']);
}
}
