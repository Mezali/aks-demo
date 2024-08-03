<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderLocationProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'order_locations_id' => $this->order_locations_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'total' => $this->quantity * $this->price,
            'product' => new StationaryBucketResource($this->product),
            'order_locations' => new OrderLocationResource($this->orderLocations),
            'created_at' => date('d/m/Y - H:i', strtotime($this->created_at)),
            'updated_at' => date('d/m/Y - H:i', strtotime($this->updated_at)),
            'delivery_location_date' => $this->delivery_location_date,
            'delivery_location_date_format' => date('d/m/Y', strtotime($this->delivery_location_date)),
            'delivery_withdrawl_date' => $this->delivery_withdrawl_date,
            'delivery_withdrawl_date_format' => date('d/m/Y', strtotime($this->delivery_withdrawl_date)),
            'timedif' => $this->timedif,
            'location_date' => $this->location_date,
            'location_date_format' => date('d/m/Y', strtotime($this->location_date)),
            'withdraw_date' => $this->withdraw_date,
            'withdraw_date_format' => date('d/m/Y', strtotime($this->withdraw_date)),
            'driver_location' => new UserResource($this->driverLocation),
            'vehicle_location' => new VehicleResource($this->vehicleLocation),
            'driver_withdraw' => new UserResource($this->driverWithdraw),
            'vehicle_withdraw' => new VehicleResource($this->vehicleWithdraw) 
        ];
    }
}
