<?php

namespace App\Http\Controllers;

use App\Enums\ProfileTypeEnum;
use App\Http\Resources\OrderLocationProductCollection;
use App\Http\Resources\OrderLocationProductResource;
use Illuminate\Http\Request;

use App\Models\{
    OrderLocationProduct,
    StationaryBucket
};

class OrderLocationProductController extends Controller
{
    public function index(Request $request)
    {

        if (ProfileTypeEnum::from($request->currentProfile->type)->equals(ProfileTypeEnum::CUSTOMER(), ProfileTypeEnum::CUSTOMER_EMPLOYEE(), ProfileTypeEnum::LEGAL_CUSTOMER())) {
            $request->merge(['clientId' => $request->owner->id]);
        }

        if (ProfileTypeEnum::from($request->currentProfile->type)->equals(ProfileTypeEnum::SELLER(), ProfileTypeEnum::LEGAL_SELLER(), ProfileTypeEnum::SELLER_EMPLOYEE())) {
            $request->merge(['providerId' => $request->owner->id]);
        }

        if ($request->has('status') && $request->status == 'EP' && ProfileTypeEnum::from($request->currentProfile->type)->equals(ProfileTypeEnum::SELLER(), ProfileTypeEnum::SELLER_DRIVER()) && $request->has('driver')) {
            $request->merge(['driverId' => $request->user()->id]);
        }

        if ($request->has('status') && $request->status == 'AR' && ProfileTypeEnum::from($request->currentProfile->type)->equals(ProfileTypeEnum::SELLER(), ProfileTypeEnum::SELLER_DRIVER()) && $request->has('driver')) {
            $request->merge(['withdrawDriverId' => $request->user()->id]);
        }

        $request->merge(['timeRef' => date('Y-m-d')]);

        $result = OrderLocationProduct::filter($request->all())
            ->sort($request->input('sort', 'id'))
            ->paginate($request->input('per_page', 10), ['*'], 'page', $request->input('page', 1));
        return new OrderLocationProductCollection($result);
    }

    public function store(Request $request)
    {

        $request->validate([
            'order_location_id' => 'required|exists:order_locations,id',
            'products' => 'required|string',
        ]);

        OrderLocationProduct::where('order_locations_id', $request->order_location_id)->delete();

        $products = explode(',', $request->products);
        foreach ($products as $productId) {
            OrderLocationProduct::create([
                'order_locations_id' => $request->order_location_id,
                'productable_id' => $productId,
                'productable_type' => 'App\Models\StationaryBucket',
            ]);
        }

        return response()->json(['message' => 'OrderLocationProduct created successfully'], 201);
    }

    public function show(OrderLocationProduct $orderLocationProduct): OrderLocationProductResource
    {
        return new OrderLocationProductResource($orderLocationProduct);
    }

    public function update(Request $request, OrderLocationProduct $orderLocationProduct): OrderLocationProductResource
    {

        if ($request->has('status')) {

            $item = StationaryBucket::find($orderLocationProduct->product->id);
            $item->status = $request->status;

            if ($request->status === 'L') $request->merge(['location_date' => date('Y-m-d H:i:s')]);
            if ($request->status === 'ETR') $request->merge(['withdraw_date' => date('Y-m-d H:i:s')]);

            $item->save();

        }

        if ($request->has('type_destination') && $request->type_destination === 'return_provider') {
            $request->merge(['destination_id' => $orderLocationProduct->orderLocations->provider_id]);
        }

        $orderLocationProduct->update($request->all());
        return new OrderLocationProductResource($orderLocationProduct);
    }
}
