<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'user_id' => $this->user_id,
            'total' => $this->getTotal(),
            'is_open' => $this->is_open,
            'client_id' => $this->client_id,
            'profile_id' => $this->profile_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'hasProducts' => $this->hasProducts(),
            'products' => new CartProductCollection($this->products),
        ];
    }
}
