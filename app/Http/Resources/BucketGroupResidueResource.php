<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BucketGroupResidueResource extends JsonResource
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
            'residue_id' => $this->residue_id,
            'stationary_bucket_group_id' => $this->stationary_bucket_group_id,
            'residue' => new ResidueResource($this->residue),
        ];
    }
}
