<?php

namespace App\Http\Controllers;

use App\Http\Requests\City\ShowRequest;
use App\Http\Resources\StateCollection;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Index
     */
    public function index(Request $request)
    {
        $states = State::filter($request->all())
            ->sort($request->input('sort', 'id'))
            ->paginate($request->input('per_page', 10), ['*'], 'page', $request->input('page', 1));
        return new StateCollection($states);
    }

    /**
     * Show     
     */
    public function show(ShowRequest $request, $id)
    {
        return State::find($id);
    }
}
