<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StationaryBucketTypeResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'm3' => $this->m3,
            'name' => $this->name,
            'photo' => $this->photo,
            'letter_a' => $this->letter_a,
            'letter_a_name' => number_format($this->letter_a, 2, ',', '.').' m',
            'letter_b' => $this->letter_b,
            'letter_b_name' => number_format($this->letter_b, 2, ',', '.').' m',
            'letter_c' => $this->letter_c,
            'letter_c_name' => number_format($this->letter_c, 2, ',', '.').' m',
            'letter_d' => $this->letter_d,
            'letter_d_name' => number_format($this->letter_d, 2, ',', '.').' m',
            'letter_e' => $this->letter_e,
            'letter_e_name' => number_format($this->letter_e, 2, ',', '.').' m',
            'letter_f' => $this->letter_f,
            'letter_f_name' => number_format($this->letter_f, 2, ',', '.').' m',
        ];
        return parent::toArray($request);
    }
}
