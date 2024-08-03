<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StationaryBucketGroupResource extends JsonResource
{
    public function formatarDistancia($distancia_metros)
    {
        // Converter metros para quilômetros
        $distancia_quilometros = $distancia_metros / 1000;

        // Formatar o número para o estilo brasileiro com duas casas decimais
        $distancia_formatada = number_format($distancia_quilometros, 2, ',', '.');

        return $distancia_formatada;
    }

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        $types_local = [
            'E' => 'Externa',
            'I' => 'Interna',
            'B' => 'Externa e Interna',
        ];

        $types_lid = [
            'A' => 'Tampa Articulada',
            'C' => 'Tampa Corrediça',
            'S' => 'Sem Tampa',
        ];
      
        return [
            'id' => $this->id,
            'stationary_bucket_type_id' => $this->stationary_bucket_type_id,
            'gallery' => new StationaryBucketGalleryCollection($this->gallery),
            'provider_id' => $this->user->id,
            'provider_name' => $this->user->name,
            'provider_photo' => $this->user->photo,
            'color' => $this->color,
            'material' => $this->material,
            'weight' => $this->weight,
            'type_lid' => $this->type_lid,
            'type_lid_name' => $types_lid[$this->type_lid],
            'type_local' => $this->type_local,
            'type_local_name' => $types_local[$this->type_local],
            'price_internal' => $this->price_internal,
            'price_internal_name' => 'R$ ' . number_format($this->price_internal, 2, ',', '.'),
            'price_external' => $this->price_external,
            'price_external_name' => 'R$ ' . number_format($this->price_external, 2, ',', '.'),            
            'distance' => $this->formatarDistancia($this->distance),
            // 'distance' => $this->distance,
            'price_order' => $this->price_order,
            'days_internal' => $this->days_internal,
            'days_external' => $this->days_external,
            'stock' => $this->stock(),
            'residues' => new ResidueCollection($this->residues),
            'stationary_bucket_type' => new StationaryBucketTypeResource($this->stationaryBucketType),
        ];
    }
}
