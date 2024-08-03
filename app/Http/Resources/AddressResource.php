<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{

    function formatarDistancia($distancia_metros) {
        // Converter metros para quilômetros
        $distancia_quilometros = $distancia_metros / 1000;
    
        // Formatar o número para o estilo brasileiro com duas casas decimais
        $distancia_formatada = number_format($distancia_quilometros, 2, ',', '.');
    
        return $distancia_formatada;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'active' => $this->active,
            'street' => $this->street,
            'number' => $this->number,
            'complement' => $this->complement,
            'district' => $this->district,
            'zip_code' => $this->zip_code,            
            'latitude' => $this->location->latitude,
            'longitude' => $this->location->longitude,
            'distance' => $this->formatarDistancia($this->distance),
            'default' => $this->default,
            'city' => new CityResource($this->city)
        ];
    }
}
