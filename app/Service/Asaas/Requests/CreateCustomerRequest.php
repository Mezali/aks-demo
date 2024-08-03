<?php

namespace App\Service\Asaas\Requests;

use Illuminate\Support\Facades\Validator;

class CreateCustomerRequest
{
    public string $name;
    public string $email;
    public ?string $phone;
    public ?string $mobilePhone;
    public ?string $cpfCnpj;
    public ?string $postalCode;
    public ?string $address;
    public ?string $addressNumber;
    public ?string $complement;
    public ?string $province;
    public ?string $externalReference;
    public ?bool $notificationDisabled;
    public ?string $additionalEmails;
    public ?string $municipalInscription;
    public ?string $stateInscription;
    public ?string $observations;

    public function __construct()
    {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            // 'phone' => $this->phone,
            // 'mobilePhone' => $this->mobilePhone,
            // 'cpfCnpj' => $this->cpfCnpj,
            // 'postalCode' => $this->postalCode,
            // 'address' => $this->address,
            // 'addressNumber' => $this->addressNumber,
            // 'complement' => $this->complement,
            // 'province' => $this->province,
            // 'externalReference' => $this->externalReference,
            // 'notificationDisabled' => $this->notificationDisabled,
            // 'additionalEmails' => $this->additionalEmails,
            // 'municipalInscription' => $this->municipalInscription,
            // 'stateInscription' => $this->stateInscription,
            // 'observations' => $this->observations,
        ];
    }

    public function validated(): self
    {
        Validator::validate(
            $this->toArray(),
            [
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'nullable|string',
                'mobilePhone' => 'nullable|string',
                'cpfCnpj' => 'nullable|string',
                'postalCode' => 'nullable|string',
                'address' => 'nullable|string',
                'addressNumber' => 'nullable|string',
                'complement' => 'nullable|string',
                'province' => 'nullable|string',
                'externalReference' => 'nullable|string',
                'notificationDisabled' => 'nullable|boolean',
                'additionalEmails' => 'nullable|string',
                'municipalInscription' => 'nullable|string',
                'stateInscription' => 'nullable|string',
                'observations' => 'nullable|string',
            ]
        );
        return $this;
    }
}
