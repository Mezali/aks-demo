<?php

namespace App\Http\Controllers;

use App\Enums\ProfileTypeEnum;
use App\Models\StationaryBucket;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;

use App\Http\Requests\StationaryBucket\{
    IndexRequest,
    StoreRequest,
    UpdateRequest
};
use App\Http\Resources\{
    StationaryBucketCollection,
    StationaryBucketResource
};

class StationaryBucketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request): StationaryBucketCollection
    {
    
        if (ProfileTypeEnum::from($request->currentProfile->type)->equals(ProfileTypeEnum::SELLER(), ProfileTypeEnum::LEGAL_SELLER(), ProfileTypeEnum::SELLER_EMPLOYEE())) {
            $request->merge(['user_id' => $request->owner->id]);
        }

        $result = StationaryBucket::filter($request->all())
            ->sort($request->input('sort', 'id'))
            ->paginate($request->input('per_page',), ['*'], 'page', $request->input('page', 1));
        return new StationaryBucketCollection($result);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): StationaryBucketResource
    {
        $object = new StationaryBucket();
        $object->code = $request->code;
        $object->stationary_bucket_group_id = $request->stationary_bucket_group_id;
        $object->user_id = $request->owner->id;

        if ($object->save()) {
            return new StationaryBucketResource($object);
        } else {
            return response()->json($object->errors(), 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(StationaryBucket $stationaryBucket): StationaryBucketResource
    {
        if (!auth()->user()) {
            throw new UnauthorizedException();
        }
        return new StationaryBucketResource($stationaryBucket);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StationaryBucket $stationaryBucket): StationaryBucketResource
    {


        if ($request->recover) {

            if (stationaryBucket::withTrashed()->find($stationaryBucket->id)->restore()) {
                return new StationaryBucketResource($stationaryBucket);
            } else {
                return response()->json(['message' => 'Error restore residue'], 500);
            }
        } else {

            $stationaryBucket->fill($request->all());

            if ($stationaryBucket->save()) {
                return new StationaryBucketResource($stationaryBucket);
            } else {
                return response()->json(['message' => 'Error updating residue'], 500);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StationaryBucket $object)
    {
        if ($object->delete()) {
            return response()->json(['message' => 'Type deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Error deleting type'], 500);
        }
    }


    public function gerar(Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'caracters' => 'required|integer|min:1|max:20',
            'stationary_bucket_group_id' => 'required|integer|exists:stationary_bucket_groups,id'
        ]);

        $codes = [];
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        for ($i = 0; $i < $request->quantity; $i++) {
            $code = '';
            for ($j = 0; $j < $request->caracters; $j++) {
                $code .= $characters[rand(0, strlen($characters) - 1)];
            }
            $codes[] = ['code' => $code, 'stationary_bucket_group_id' => $request->stationary_bucket_group_id, 'user_id' => $request->owner->id, 'created_at' => now(), 'updated_at' => now()];
        }

        try {
            StationaryBucket::insert($codes);


            return response()->json(['message' => 'created successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e], 500);
        }
    }
}
