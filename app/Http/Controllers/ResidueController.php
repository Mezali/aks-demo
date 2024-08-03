<?php

namespace App\Http\Controllers;

use App\Models\Residue;

use App\Http\Resources\{
    ResidueCollection,
    ResidueResource
};
use Illuminate\Http\{
    JsonResponse,
    Request
};

class ResidueController extends Controller
{
    /**
     * List Residue.
     */
    public function index(Request $request): ResidueCollection
    {
        $result = Residue::filter($request->all())
            ->sort($request->input('sort', 'id'))
            ->paginate($request->input('per_page', 10), ['*'], 'page', $request->input('page', 1));

        return new ResidueCollection($result);
    }

    /**
     * Save Residue.
     */
    public function store(Request $request): ResidueResource
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $residude = new Residue();
        $residude->fill($request->all());
        if ($residude->save()) {
            return new ResidueResource($residude);
        } else {
            return response()->json(['message' => 'Error creating residuee'], 500);
        }
    }

    /**
     * Show Residue.
     */
    public function show(Request $request, Residue $residue): ResidueResource
    {
        return new ResidueResource($residue);
    }

    /**
     * Update Residue.
     */
    public function update(Request $request, Residue $residue): ResidueResource
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'recover' => 'nullable|boolean',
        ]);


        if ($request->recover) {
            if (Residue::withTrashed()->find($residue->id)->restore()) {
                return new ResidueResource($residue);
            } else {
                return response()->json(['message' => 'Error restore residue'], 500);
            }
        }



        if ($request->has('name')) {
            $residue->name = $request->name;
        }

        if ($request->has('description')) {
            $residue->description = $request->description;
        }


        if ($residue->save()) {
            return new ResidueResource($residue);
        } else {
            return response()->json(['message' => 'Error updating residue'], 500);
        }
    }

    /**
     * Delte Residue.
     */
    public function destroy(Request $request, Residue $residue): JsonResponse
    {

        if ($residue->delete()) {
            return response()->json(['message' => 'Residue deleted'], 200);
        } else {
            return response()->json(['message' => 'Error deleting residue'], 500);
        }
    }
}
