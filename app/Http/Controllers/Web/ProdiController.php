<?php

namespace App\Http\Controllers\Web;

use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdiController extends Controller
{
    // GET /prodi
    public function index()
    {
        return response()->json(Prodi::all());
    }

    // POST /prodi/create
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $prodi = Prodi::create($validated);

        return response()->json([
            'message' => 'Prodi created successfully.',
            'data' => $prodi
        ], 201);
    }

    // PUT /prodi/{id}
    public function update(Request $request, $id)
    {
        $prodi = Prodi::find($id);

        if (! $prodi) {
            return response()->json(['message' => 'Prodi not found.'], 404);
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $prodi->update($validated);

        return response()->json([
            'message' => 'Prodi updated successfully.',
            'data' => $prodi
        ]);
    }

    //Delete /prodi/{id}
    public function destroy($id)
     {
    $prodi = Prodi::find($id);

    if (! $prodi) {
        return response()->json(['message' => 'Prodi not found.'], 404);
    }

    $prodi->delete();

    return response()->json(['message' => 'Prodi deleted successfully.']);
    }
}
