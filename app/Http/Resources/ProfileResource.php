<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $types = [
            'CUSTOMER' => 'Locatário PF',
            'LEGAL_CUSTOMER' => 'Locatário PJ',
            'CUSTOMER_EMPLOYEE' => 'Empregado Locatário',
            'SELLER' => 'Locador PF',
            'LEGAL_SELLER' => 'Locador PJ',
            'SELLER_EMPLOYEE' => 'Empregado Locador',
            'SELLER_DRIVER' => 'Motorista Locador',
            'ADMIN' => 'Administrador',
            'ADMIN_EMPLOYEE' => 'Empregado Administrador',
            'DEVELOPER' => 'Desenvolvedor',
            'FINAL_DESTINATION' => 'Destino Final PF',
            'LEGAL_FINAL_DESTINATION' => 'Destino Final PJ',
        ];

        return [
            'id' => $this->id,
            'type' => $this->type,
            'owner' => $this->company_id > 0 ? $this->company_id : $this->user_id,
            'permissions' => $this->getPermissions(),
            'label' => $types[$this->type],
        ];
    }
}
