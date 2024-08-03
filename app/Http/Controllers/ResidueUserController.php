<?php

namespace App\Http\Controllers;

use App\Http\Resources\ResidueCollection;
use App\Models\ResidueUser;
use App\Models\User;
use Illuminate\Http\Request;

class ResidueUserController extends Controller
{
    /**
     * List ResidueUser.
     */
    public function show(Request $request, int $id)
    {
        $residues =  (User::find($request->owner->id))->residues()->get();


        return new ResidueCollection($residues);
    }

    /**
     * Save ResidueUser.
     */
    public function store(Request $request)
    {
        $request->validate([
            'residue_id' => 'required|integer|exists:residues,id',
        ]);

        $result = new ResidueUser();
        $result->residue_id = $request->residue_id;
        $result->user_id = $request->owner->id;

        if ($result->save()) {
            return response()->json(['message' => 'ResidueUser created'], 201);
        } else {
            return response()->json(['message' => 'ResidueUser not created'], 500);
        }
    }

    public function destroy(Request $request, int $id)
    {
        $residueUser = ResidueUser::where('residue_id', $id)
            ->where('user_id', $request->owner->id)
            ->first();

        if ($residueUser->delete()) {
            return response()->json(['message' => 'ResidueUser deleted'], 200);
        } else {
            return response()->json(['message' => 'ResidueUser not deleted'], 500);
        }
    }
}
