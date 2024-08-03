<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'secondary_email' => $this->secondary_email,
            'phone' => $this->phone,
            'secondary_phone' => $this->secondary_phone,
            'photo' => $this->photo,
            'document_number' => $this->document_type === 'cpf' ? $this->toCPF($this->document_number) : $this->toCNPJ($this->document_number),
            'document_type' => $this->document_type,
            'email_verified_at' => $this->email_verified_at,
            'cnh' => $this->cnh,
            'cnh_expiration_date' => $this->cnh_expiration_date,
            'cnh_expiration_date_format' => $this->cnh_expiration_date != null ? date('d/m/Y', strtotime($this->cnh_expiration_date)) : null,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'permissions' => explode(',', $this->profiles()->first()->permissions),
            'distance' => $this->formatarDistancia($this->distance),
            'address' => new AddressResource($this->getActiveAddress()),
        ];
    }

    protected function toCPF(string $cpf): string {
        return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9);
    }

    protected function toCNPJ(string $cnpj): string {
        return substr($cnpj, 0, 2) . '.' . substr($cnpj, 2, 3) . '.' . substr($cnpj, 5, 3) . '/' . substr($cnpj, 8, 4) . '-' . substr($cnpj, 12, 2);
    }

}
