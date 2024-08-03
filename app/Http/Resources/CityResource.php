<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
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
            'state_id' => $this->state_id,
            'receive_only_finished' => $this->receive_only_finished,
            'receive_only_finished_name' => $this->receive_only_finished ? 'Sim' : 'Não',
            'receive_only_finished_color' => $this->receive_only_finished ? '#0E7A0D' : '#FC1723',
            'name' => $this->name,
            'ibge_code' => $this->ibge_code,
            'logo_image' => $this->logo_image,
            'state' => new StateResource($this->getState()),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
