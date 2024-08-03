<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProfileCollection;

class MeResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'document_type' => $this->document_type, // Add 'document_type' to the array
            'document_number' => $this->document_number,
            'photo' => $this->photo,
            'phone' => $this->phone,
            'secondary_phone' => $this->secondary_phone,
            'secondary_email' => $this->secondary_email,
            'last_login_at' => $this->last_login_at,
            'fantasy_name' => $this->fantasy_name,
            'state_registration' => $this->state_registration,
            'municipal_registration' => $this->municipal_registration,
            'responsible_name' => $this->responsible_name,
            'responsible_document' => $this->responsible_document,
            'responsible_office' => $this->responsible_office,
            'responsible_departament' => $this->responsible_departament,
            'responsible_phone' => $this->responsible_phone,
            'responsible_email' => $this->responsible_email,
            'responsible_secondary_phone' => $this->responsible_secondary_phone,
            'responsible_secondary_email' => $this->responsible_secondary_email,
            'description' => $this->description,
            'cnh' => $this->cnh,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'profiles' => new ProfileCollection($this->getProfiles()),
        ];
    }
}
