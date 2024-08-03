<?php

namespace App\Http\Controllers;

use App\Http\Resources\VehicleCollection;
use App\Http\Resources\VehicleResource;
use App\Models\Vehicle;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): VehicleCollection
    {
        $request->merge(['userId' => $request->owner->id]);

        $result = Vehicle::filter($request->all())
            ->sort($request->input('sort', 'name'))
            ->paginate($request->input('per_page', 10), ['*'], 'page', $request->input('page', 1));

        return new VehicleCollection($result);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): VehicleResource
    {
        $vehicle = new Vehicle();
        $vehicle->fill($request->all());
        $vehicle->user_id = $request->user()->id;
        if ($vehicle->save()) {
            return new VehicleResource($vehicle);
        } else {
            return response()->json(['message' => 'Error creating vehicle'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Vehicle $vehicle): VehicleResource
    {
        return new VehicleResource($vehicle);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle): VehicleResource
    {

        if ($request->recover) {

            if (Vehicle::withTrashed()->find($vehicle->id)->restore()) {
                return new VehicleResource($vehicle);
            } else {
                return response()->json(['message' => 'Error restore vehicle'], 500);
            }

        }

        $vehicle->fill($request->all());

        if ($vehicle->save()) {
            return new VehicleResource($vehicle);
        } else {
            return response()->json(['message' => 'Error updating vehicle'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Vehicle $vehicle): JsonResponse
    {
        if ($vehicle->delete()) {
            return response()->json(['message' => 'Vehicle  deleted'], 200);
        } else {
            return response()->json(['message' => 'Error deleting vehicle '], 500);
        }
    }
}
