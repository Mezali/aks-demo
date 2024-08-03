<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vehicle\Type\DestroyRequest;
use App\Http\Requests\Vehicle\Type\IndexRequest;
use App\Http\Requests\Vehicle\Type\ShowRequest;
use App\Http\Requests\Vehicle\Type\StoreRequest;
use App\Http\Requests\Vehicle\Type\UpdateRequest;
use App\Http\Resources\VehicleTypeCollection;
use App\Http\Resources\VehicleTypeResource;
use App\Models\VehicleType;
use Illuminate\Http\JsonResponse;

class VehicleTypeController extends Controller
{
    public function index(IndexRequest $request): VehicleTypeCollection
    {
        $result = VehicleType::filter($request->all())
            ->sort($request->input('sort', 'id'))
            ->paginate($request->input('per_page', 10), ['*'], 'page', $request->input('page', 1));
        return new VehicleTypeCollection($result);
    }

    public function store(StoreRequest $request): VehicleTypeResource
    {
        $vehicleType = new VehicleType();
        $vehicleType->fill($request->all());
        if ($vehicleType->save()) {
            return new VehicleTypeResource($vehicleType);
        } else {
            return response()->json(['message' => 'Error creating vehicle type'], 500);
        }
    }

    public function show(ShowRequest $request, VehicleType $vehicleType): VehicleTypeResource
    {
        return new VehicleTypeResource($vehicleType);
    }

    public function update(UpdateRequest $request, VehicleType $vehicleType): VehicleTypeResource
    {

        if ($request->recover) {

            if (VehicleType::withTrashed()->find($vehicleType->id)->restore()) {
                return new VehicleTypeResource($vehicleType);
            } else {
                return response()->json(['message' => 'Error restore vehicle'], 500);
            }

        }

        $vehicleType->fill($request->all());

        if ($vehicleType->save()) {
            return new VehicleTypeResource($vehicleType);
        } else {
            return response()->json(['message' => 'Error updating vehicle type'], 500);
        }
    }

    public function destroy(DestroyRequest $request, VehicleType $vehicleType): JsonResponse
    {
        if ($vehicleType->delete()) {
            return response()->json(['message' => 'Vehicle type deleted'], 200);
        } else {
            return response()->json(['message' => 'Error deleting vehicle type'], 500);
        }
    }
}
