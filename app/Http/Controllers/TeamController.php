<?php

namespace App\Http\Controllers;

use App\Enums\ProfileTypeEnum;
use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Index
     */
    public function index(Request $request): UserCollection
    {
        $request->merge(['company_id' => $request->owner->id]);
        $result = User::filter(
            $request->all() + ['profile_type' => [ProfileTypeEnum::SELLER_EMPLOYEE(), ProfileTypeEnum::CUSTOMER_EMPLOYEE(), ProfileTypeEnum::ADMIN_EMPLOYEE()]]
        )
            ->sort($request->input('sort', 'name'))
            ->paginate($request->input('per_page', 10), ['*'], 'page', $request->input('page', 1));

        return new UserCollection($result);
    }

    /**
     * Store.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * UpdateS.
     */
    public function update(Request $request, string $id)
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
