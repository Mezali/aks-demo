<?php

namespace App\Service\Asaas\Requests;

use Illuminate\Support\Facades\Validator;

class CreateAccountRequest
{
    public string $name;
    public string $email;
    public string $cpfCnpj;
    public string $birthDate;
    public ?string $companyType;
    public ?string $phone;
    public string $mobilePhone;
    public ?string $site;
    public float $incomeValue;
    public string $address;
    public string $addressNumber;
    public string $complement;
    public string $province;
    public string $postalCode;

    public function __construct(
        string $name,
        string $email,
        string $cpfCnpj,
        string $birthDate,
        ?string $companyType,
        ?string $phone,
        string $mobilePhone,
        ?string $site,
        float $incomeValue,
        string $address,
        string $addressNumber,
        string $complement,
        string $province,
        string $postalCode
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->cpfCnpj = $cpfCnpj;
        $this->birthDate = $birthDate;
        $this->companyType = $companyType;
        $this->phone = $phone;
        $this->mobilePhone = $mobilePhone;
        $this->site = $site;
        $this->incomeValue = $incomeValue;
        $this->address = $address;
        $this->addressNumber = $addressNumber;
        $this->complement = $complement;
        $this->province = $province;
        $this->postalCode = $postalCode;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'cpfCnpj' => $this->cpfCnpj,
            'birthDate' => $this->birthDate,
            'companyType' => $this->companyType,
            'phone' => $this->phone,
            'mobilePhone' => $this->mobilePhone,
            'site' => $this->site,
            'incomeValue' => $this->incomeValue,
            'address' => $this->address,
            'addressNumber' => $this->addressNumber,
            'complement' => $this->complement,
            'province' => $this->province,
            'postalCode' => $this->postalCode,
            'webhooks' => [
                'name' => 'Webhook de pagamento',
                'url' => env('ASAAS_WEBHOOK_URL'),
                'email' => env('ASAAS_WEBHOOK_EMAIL'),
                'sendType' => 'SEQUENTIALLY',
                'interrupted' => false,
                'enabled' => true,
                'eventTypes' => ["PAYMENT_CREATED", "PAYMENT_UPDATED", "PAYMENT_CONFIRMED", "PAYMENT_RECEIVED"]
            ]
        ];
    }

    public function validated(): void
    {
        Validator::validate(
            [
                'name' => $this->name,
                'email' => $this->email,
                'cpfCnpj' => $this->cpfCnpj,
                'birthDate' => $this->birthDate,
                'companyType' => $this->companyType,
                'phone' => $this->phone,
                'mobilePhone' => $this->mobilePhone,
                'site' => $this->site,
                'incomeValue' => $this->incomeValue,
                'address' => $this->address,
                'addressNumber' => $this->addressNumber,
                'complement' => $this->complement,
                'province' => $this->province,
                'postalCode' => $this->postalCode,
            ],
            [
                'name' => 'required|string',
                'email' => 'required|email',
                'cpfCnpj' => 'required|string',
                'birthDate' => 'required|date',
                'companyType' => 'nullable|string',
                'phone' => 'nullable|string',
                'mobilePhone' => 'required|string',
                'site' => 'nullable|string',
                'incomeValue' => 'required|numeric',
                'address' => 'required|string',
                'addressNumber' => 'required|string',
                'complement' => 'required|string',
                'province' => 'required|string',
                'postalCode' => 'required|string',
            ]
        );
    }
}
