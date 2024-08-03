<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderLocationProductBasicResource extends JsonResource
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
            'created_at' => date('d/m/Y - H:i', strtotime($this->created_at)),
            'updated_at' => date('d/m/Y - H:i', strtotime($this->updated_at)),
        ];
    }
}
