<?php

namespace App\Http\Controllers;

use App\Enums\ProfileTypeEnum;
use App\Models\OrderLocation;
use Illuminate\Http\Request;

use App\Http\Resources\{
    OrderLocationCollection,
    OrderLocationProductCollection,
    OrderLocationResource
};
use App\Models\OrderLocationProduct;
use App\Models\StationaryBucket;

class OrderLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (ProfileTypeEnum::from($request->currentProfile->type)->equals(ProfileTypeEnum::CUSTOMER(), ProfileTypeEnum::CUSTOMER_EMPLOYEE(), ProfileTypeEnum::LEGAL_CUSTOMER())) {
            $request->merge(['client_id' => $request->owner->id]);
        }

        if (ProfileTypeEnum::from($request->currentProfile->type)->equals(ProfileTypeEnum::SELLER(), ProfileTypeEnum::LEGAL_SELLER(), ProfileTypeEnum::SELLER_EMPLOYEE())) {
            $request->merge(['provider_id' => $request->owner->id]);
        }

        $result = OrderLocation::filter($request->all())
            ->sort($request->input('sort', 'id'))
            ->paginate($request->input('per_page', 10), ['*'], 'page', $request->input('page', 1));
        return new OrderLocationCollection($result);
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
    public function show(OrderLocation $orderLocation): OrderLocationResource
    {
        return new OrderlocationResource($orderLocation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderLocation $orderLocation): OrderLocationResource
    {
        if ($request->has('status')) {

            if ( $request->status === 'PA' ) {

                foreach ($orderLocation->items as $key => $value) {
                    $item = StationaryBucket::find($value->product->id);
                    $item->status = 'EP';
                    $item->save();
                }

            }
            
            $orderLocation->status = $request->status;

        }

        if ($orderLocation->save()) {
            return new OrderLocationResource($orderLocation);
        } else {
            return response()->json(['message' => 'Error updating order location'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
