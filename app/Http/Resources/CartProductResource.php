<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartProductResource extends JsonResource
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
            'cart_id' => $this->cart_id,
            'address' => new AddressResource($this->address),
            'type_local' => $this->type_local,
            'quantity' => $this->quantity,
            'days' => $this->days,
            'price' => $this->price,
            'product' => new StationaryBucketGroupResource($this->productable),
            'residues' => new ResidueCollection($this->residues),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
