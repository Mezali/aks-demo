<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderLocationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $status_name = [
            'AR' => ['code' => 'AR', 'name' => 'Aguardando Confirmação', 'color' => '#ff8c00'],
            'PA' => ['code' => 'PA', 'name' => 'Pedido aceito', 'color' => '#008000'],
            'PC' => ['code' => 'PC', 'name' => 'Pedido cancelado', 'color' => '#B22525'],
            'PP' => ['code' => 'PP', 'name' => 'Pedido em preparação', 'color' => '#008000'],
            'PR' => ['code' => 'PR', 'name' => 'Pedido recusado', 'color' => '#B22525'],
        ];

        return [
            'id' => $this->id,
            'order_id' => $this->order_id,
            'status' => $status_name[$this->status],
            'location_id' => $this->location_id,
            'distance' =>  number_format($this->distance / 1000, 2, ',', '.'),
            'total' => $this->getTotal(),
            'cart_product' => new CartProductResource($this->cartProduct),
            'provider' => new UserResource($this->provider),
            'client' => new UserResource($this->client),
            'items' => new OrderLocationProductBasicCollection($this->items),
            'created_at' => date('d/m/Y - H:i', strtotime($this->created_at)),
            'updated_at' => date('d/m/Y - H:i', strtotime($this->updated_at)),

        ];
    }
}
