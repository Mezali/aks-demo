<?php

namespace App\Http\Controllers;

use App\Models\StationaryBucketType;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;

use App\Http\Requests\StationaryBucket\Type\{
    IndexRequest,
    StoreRequest,
    UpdateRequest
};
use App\Http\Resources\{
    StationaryBucketTypeCollection,
    StationaryBucketTypeResource
};

class StationaryBucketTypeController extends Controller
{

    /**
     * Index
     */
    public function index(IndexRequest $request): StationaryBucketTypeCollection
    {
        $result = StationaryBucketType::filter($request->all())
            ->sort($request->input('sort', 'id'))
            ->paginate($request->input('per_page',), ['*'], 'page', $request->input('page', 1));
        return new StationaryBucketTypeCollection($result);
    }

    /**
     * Store
     */
    public function store(StoreRequest $request): StationaryBucketTypeResource
    {
        $object = new StationaryBucketType();
        $object->fill($request->all());
        if ($object->save()) {
            return new StationaryBucketTypeResource($object);
        } else {
            return response()->json($object->errors(), 422);
        }
    }

    /**
     * Show
     */
    public function show(Request $request, StationaryBucketType $stationaryBucketType): StationaryBucketTypeResource
    {
        if (!auth()->user()) {
            throw new UnauthorizedException();
        }

        return new StationaryBucketTypeResource($stationaryBucketType);
    }

    /**
     * Update
     */
    public function update(UpdateRequest $request, StationaryBucketType $stationary_bucket_type): StationaryBucketTypeResource
    {

        if ($request->has('recover')) {
            if (StationaryBucketType::withTrashed()->find($stationary_bucket_type->id)->restore()) {
                return new StationaryBucketTypeResource($stationary_bucket_type);
            } else {
                return response()->json(['message' => 'Error restore stationary bucket type'], 500);
            }
        }

        if ($request->has('name')) {
            $stationary_bucket_type->name = $request->name;
        }
        if ($request->has('m3')) {
            $stationary_bucket_type->m3 = $request->m3;
        }
        if ($request->has('letter_a')) {
            $stationary_bucket_type->letter_a = $request->letter_a;
        }

        if ($request->has('letter_b')) {
            $stationary_bucket_type->letter_b = $request->letter_b;
        }

        if ($request->has('letter_c')) {
            $stationary_bucket_type->letter_c = $request->letter_c;
        }

        if ($request->has('letter_d')) {
            $stationary_bucket_type->letter_d = $request->letter_d;
        }

        if ($request->has('letter_e')) {
            $stationary_bucket_type->letter_e = $request->letter_e;
        }

        if ($request->has('letter_f')) {
            $stationary_bucket_type->letter_f = $request->letter_f;
        }

        if ($request->has('photo')) {
            $stationary_bucket_type->photo = $request->photo;
        }
        if ($stationary_bucket_type->save()) {
            return new StationaryBucketTypeResource($stationary_bucket_type);
        } else {
            return response()->json(['message' => 'Error updating type'], 422);
        }
    }



    /**
     * Destroy
     */
    public function destroy(Request $request, StationaryBucketType $stationary_bucket_type)
    {
        if ($stationary_bucket_type->delete()) {
            return response()->json(['message' => 'Type deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Error deleting type'], 500);
        }
    }
}
