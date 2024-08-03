<?php

namespace App\Http\Controllers;

use App\Enums\ProfileTypeEnum;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

use App\Models\{
    Address,
    User
};

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): UserCollection
    {

        $request->validate([
            'search' => 'nullable|string',
            'sort' => 'nullable|string',
            'per_page' => 'nullable|integer',
            'page' => 'nullable|integer',
            'address_id' => 'nullable|integer',
            'address_ref' => 'nullable|integer',
            'max_distance' => 'nullable|integer',
        ]);

        if (ProfileTypeEnum::from($request->currentProfile->type)->equals(ProfileTypeEnum::CUSTOMER(), ProfileTypeEnum::CUSTOMER_EMPLOYEE(), ProfileTypeEnum::LEGAL_CUSTOMER())) {
            $address = Address::filter(['user_id' => $request->owner->id, 'default' => 1])->first();
            $request->merge(['cityId' => $address->city_id ? $address->city_id : 0, 'address_ref' => $address->id]);
        }
        
        $request->merge(['provider' => true]);

        $providers = User::filter($request->all())
            ->sort($request->input('sort', 'name'))
            ->paginate($request->input('per_page', 10), ['*'], 'page', $request->input('page', 1));

        return new UserCollection($providers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, User $provider): UserResource
    {
        ds($provider);
        return new UserResource($provider);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
