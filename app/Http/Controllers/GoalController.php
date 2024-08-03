<?php

namespace App\Http\Controllers;

use App\Http\Resources\GoalCollection;
use App\Http\Resources\GoalResource;
use App\Models\Goal;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;

class GoalController extends Controller
{
    public function index(Request $request): GoalCollection
    {
        $request->merge(['userId' => $request->owner->id]);

        $result = Goal::filter($request->all())
            ->paginate($request->input('per_page', 10), ['*'], 'page', $request->input('page', 1));

        return new GoalCollection($result);
    }

    public function show(Goal $goal): GoalResource
    {
        if (!auth()->user()) {
            throw new UnauthorizedException();
        }
        return new GoalResource($goal);
    }

    public function store(Request $request)
    {

        $request->merge(['user_id' => $request->owner->id]);

        $goal = new Goal();
        $goal->fill($request->all());
        if ($goal->save()) {
            return new GoalResource($goal);
        } else {
            return response()->json(['message' => 'Error creating goal'], 500);
        }
    }

    public function update(Request $request, Goal $goal): GoalResource
    {
        if ($request->has('goal')) {
            $goal->goal = $request->goal;
        }

        if ($goal->save()) {
            return new GoalResource($goal);
        } else {
            return response()->json(['message' => 'Error updating goal'], 500);
        }
    }

}
