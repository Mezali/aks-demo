<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
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
            'vehicle_type_id' => $this->vehicle_type_id,
            'vehicle_type' => new VehicleTypeResource($this->vehicleType),
            'renavam' => $this->renavam,
            'year_manufacture' => $this->year_manufacture,
            'year_model' => $this->year_model,
            'brand' => $this->brand,
            'model' => $this->model,
            'version' => $this->version,
            'fuel' => $this->fuel,
            'motor' => $this->motor,
            'total_gross_weight' => $this->total_gross_weight,
            'plate' => $this->plate,
            'capacity' => $this->capacity,
            'axles' => $this->axles,
            'status' => $this->status,
            'status_name' => $this->getStatus(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
