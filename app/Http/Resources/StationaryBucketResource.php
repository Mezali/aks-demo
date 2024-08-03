<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StationaryBucketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $status = [
            'D' => [ 'code' => 'D', 'color' => '#08A045', 'name' => 'Disponível'],
            'EP' => [ 'code' => 'EP', 'color' => '#ff8c00', 'name' => 'Entrega pendente'],
            'L' => [ 'code' => 'L', 'color' => '#083D77', 'name' => 'Locada'],
            'AR' => [ 'code' => 'AR', 'color' => '#DA4167', 'name' => 'Aguardando retirada'],
            'ETL' => [ 'code' => 'ETL', 'color' => '#52489C', 'name' => 'Em trânsito para locação'],
            'ETR' => [ 'code' => 'ETR', 'color' => '#89023E', 'name' => 'Em trânsito para descarte'],
        ];

        return [
            'id' => $this->id,
            'stationary_bucket_group' => new StationaryBucketGroupResource($this->stationaryBucketGroup),
            'code' => $this->code,
            'status' => $status[$this->status]
        ];

    }
}
