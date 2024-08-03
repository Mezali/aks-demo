<?php

namespace App\Http\Controllers;

use App\Enums\ProfileTypeEnum;
use App\Http\Requests\User\StoreRequest;
use Illuminate\Http\Request;

use App\Http\Resources\{
    UserCollection,
    UserResource
};
use App\Models\{
    Profile,
    User
};

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): UserCollection
    {
        $result = User::filter(
            $request->all() + ['profile_type' => [ProfileTypeEnum::CUSTOMER(), ProfileTypeEnum::LEGAL_CUSTOMER()]]
        )
            ->sort($request->input('sort', 'name'))
            ->paginate($request->input('per_page', 10), ['*'], 'page', $request->input('page', 1));

        return new UserCollection($result);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        
    }



    /**
     * Display the specified resource.
     */
    public function show(User $client): UserResource
    {
        return new UserResource($client);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $client)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $client)
    {
        
    }
}
