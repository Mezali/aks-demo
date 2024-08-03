<?php

namespace App\Http\Controllers;

use App\Enums\ProfileTypeEnum;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;

use App\Http\Requests\StationaryBucket\Group\{
    StoreRequest as StoreGroupRequest,
    UpdateRequest as UpdateGroupRequest
};
use App\Http\Resources\{
    StationaryBucketGroupCollection,
    StationaryBucketGroupResource
};
use App\Models\{
    Address,
    BucketGroupResidue,
    Profile,
    StationaryBucketGroup
};

class StationaryBucketGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): StationaryBucketGroupCollection
    {
        $request->validate([
            'per_page' => 'nullable|sometimes|integer|min:1|max:100',
            'page' => 'nullable|sometimes|integer|min:1',
            'sort' => 'nullable|sometimes|string',
            'type_local' => 'nullable|sometimes|string|in:I,E,B',
            'type_lid' => 'nullable|sometimes|string',
            'address_id' => 'nullable|sometimes|integer',
            'address_ref' => 'nullable|sometimes|integer',
            'max_distance' => 'nullable|sometimes|integer',
        ]);

        if (ProfileTypeEnum::from($request->currentProfile->type)->equals(ProfileTypeEnum::SELLER(), ProfileTypeEnum::LEGAL_SELLER(), ProfileTypeEnum::SELLER_EMPLOYEE())) {
            $request->merge(['userId' => $request->owner->id]);
        }

        if (ProfileTypeEnum::from($request->currentProfile->type)->equals(ProfileTypeEnum::CUSTOMER(), ProfileTypeEnum::CUSTOMER_EMPLOYEE(), ProfileTypeEnum::LEGAL_CUSTOMER())) {
            $address = Address::filter(['user_id' => $request->owner->id, 'default' => 1])->first();
            $request->merge(['cityId' => $address->city_id ? $address->city_id : 0, 'address_ref' => $address->id]);
        }

        $result = StationaryBucketGroup::filter($request->all())
            ->sort($request->input('sort', 'id'))
            ->paginate($request->input('per_page', 10), ['*'], 'page', $request->input('page', 1));
        return new StationaryBucketGroupCollection($result);
    }

    /**
     * Store
     */
    public function store(StoreGroupRequest $request): StationaryBucketGroupResource
    {
        if (!$request->has('user_id') && !$request->has('shop')) {
            $request->merge(['user_id' => $request->owner->id]);
        }


        $object = new StationaryBucketGroup();
        $object->fill($request->all());
        $object->save();

        $residues = explode(',', $request->residues);
        if (count($residues) > 0) {
            foreach ($residues as $residue) {
                BucketGroupResidue::updateOrCreate([
                    'stationary_bucket_group_id' => $object->id,
                    'residue_id' => $residue
                ]);
            }
        }



        if ($object) {
            return new StationaryBucketGroupResource($object);
        } else {
            return response()->json($object->errors(), 422);
        }
    }

    /**
     * Show.
     */
    public function show(StationaryBucketGroup $stationaryBucketGroup): StationaryBucketGroupResource
    {
        if (!auth()->user()) {
            throw new UnauthorizedException();
        }
        return new StationaryBucketGroupResource($stationaryBucketGroup);
    }

    /**
     * Update
     */
    public function update(UpdateGroupRequest $request, StationaryBucketGroup $stationaryBucketGroup): StationaryBucketGroupResource
    {

        if ($request->recover) {
            if (StationaryBucketGroup::withTrashed()->find($stationaryBucketGroup->id)->restore()) {
                return new StationaryBucketGroupResource($stationaryBucketGroup);
            } else {
                return response()->json(['message' => 'Error restore stationary bucket'], 500);
            }
        }

        $stationaryBucketGroup->fill($request->all());

        $residues = explode(',', $request->residues);
        if (count($residues) > 0) {
            foreach ($residues as $residue) {
                BucketGroupResidue::where([
                    'stationary_bucket_group_id' => $stationaryBucketGroup->id,
                ])->delete();
            }
            foreach ($residues as $residue) {
                BucketGroupResidue::updateOrCreate([
                    'stationary_bucket_group_id' => $stationaryBucketGroup->id,
                    'residue_id' => $residue
                ]);
            }
        }

        if ($stationaryBucketGroup->save()) {
            return new StationaryBucketGroupResource($stationaryBucketGroup);
        } else {
            return response()->json(['message' => 'Error updating Group'], 500);
        }
    }

    /**
     * Delete
     */
    public function destroy(StationaryBucketGroup $stationaryBucketGroup)
    {
        if ($stationaryBucketGroup->delete()) {
            return response()->json(['message' => 'Type deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Error deleting Group'], 500);
        }
    }
}
