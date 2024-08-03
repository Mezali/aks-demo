<?php

namespace App\Http\Controllers;

use App\Http\Resources\ResidueCollection;
use App\Models\OrderLocation;
use App\Models\OrderLocationResidue;
use App\Models\User;
use Illuminate\Http\Request;

class OrderLocationResidueController extends Controller
{
    /**
     * List OrderLocationResidue.
     */
    public function show(Request $request, int $id)
    {
        $residues =  (OrderLocation::find($id))->residues()->get();
        return new ResidueCollection($residues);
    }

    /**
     * Save ResidueUser.
     */
    public function store(Request $request)
    {
        
    }

    public function destroy(Request $request, int $id)
    {
        
    }
}
