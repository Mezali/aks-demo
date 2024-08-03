<?php

namespace App\Service\Asaas\Requests;

use Illuminate\Support\Facades\Validator;

class ChargeRequest
{
    public string $customer;
    public string $billingType;
    public string $value;
    public ?string $description;
    public ?string $externalReference;
    public ?string $name;
    public ?string $cardNumber;
    public ?string $expiryMonth;
    public ?string $expiryYear;
    public ?string $ccv;
    public ?string $email;
    public ?string $cpfCnpj;
    public ?string $postalCode;
    public ?string $addressNumber;
    public ?string $phone;
    public ?string $remoteIp;

    public function __construct(
        string $billingType,
        string $customer,
        string $value,
        ?string $addressNumber = null,
        ?string $cardNumber =  null,
        ?string $cpfCnpj = null,
        ?string $ccv = null,
        ?string $description = null,
        ?string $email = null,
        ?string $expiryMonth = null,
        ?string $expiryYear = null,
        ?string $externalReference = null,
        ?string $name = null,
        ?string $phone = null,
        ?string $postalCode = null,
        ?string $remoteIp = null,
    ) {
        $this->customer = $customer;
        $this->billingType = $billingType;
        $this->value = $value;
        $this->description = $description;
        $this->externalReference = $externalReference;
        $this->name = $name;
        $this->cardNumber = $cardNumber;
        $this->expiryMonth = $expiryMonth;
        $this->expiryYear = $expiryYear;
        $this->ccv = $ccv;
        $this->email = $email;
        $this->cpfCnpj = $cpfCnpj;
        $this->postalCode = $postalCode;
        $this->addressNumber = $addressNumber;
        $this->phone = $phone;
        $this->remoteIp = $remoteIp;
    }


    public function toArray(): array
    {
        if ($this->billingType === 'BOLETO' || $this->billingType === 'PIX') {
            return [
                'billingType' => $this->billingType,
                'customer' => $this->customer,
                'dueDate' => date('Y-m-d', strtotime('+30 days')),
                'value' => $this->value,                
                'description' => $this->description,
                'externalReference' => $this->externalReference,
            ];
        }
        return [
            'billingType' => 'CREDIT_CARD',
            'creditCard' => [
                'holderName' => $this->name,
                'number' => $this->cardNumber,
                'expiryMonth' => $this->expiryMonth,
                'expiryYear' => $this->expiryYear,
                'ccv' => $this->ccv,
            ],
            'creditCardHolderInfo' => [
                'name' => $this->name,
                'email' => $this->email,
                'cpfCnpj' => $this->cpfCnpj,
                'postalCode' => $this->postalCode,
                'addressNumber' => $this->addressNumber,
                'phone' => $this->phone,
            ],
            'customer' => $this->customer,
            'dueDate' => date('Y-m-d'),            
            'value' => $this->value,
            'description' => $this->description,
            'externalReference' => $this->externalReference,
            'remoteIp' => $this->remoteIp,
        ];
    }

    public function validate(): self
    {
        if ($this->billingType === 'BOLETO' || $this->billingType === 'PIX') {
            Validator::validate(
                $this->toArray(),
                [
                    'billingType' => 'required|string|in:BOLETO,PIX',
                    'customer' => 'required|string',
                    'dueDate' => 'required|string',
                    'value' => 'required|string',
                    'description' => 'required|string',
                    'externalReference' => 'required|string',
                ]
            );
            return $this;
        } else {
            Validator::validate(
                $this->toArray(),
                [
                    'billingType' => 'required|string|inCREDIT_CARD',
                    'creditCard' => 'required|array',
                    'creditCard.holderName' => 'required|string',
                    'creditCard.number' => 'required|string',
                    'creditCard.expiryMonth' => 'required|string',
                    'creditCard.expiryYear' => 'required|string',
                    'creditCard.ccv' => 'required|string',
                    'creditCardHolderInfo' => 'required|array',
                    'creditCardHolderInfo.name' => 'required|string',
                    'creditCardHolderInfo.email' => 'required|string',
                    'creditCardHolderInfo.cpfCnpj' => 'required|string',
                    'creditCardHolderInfo.postalCode' => 'required|string',
                    'creditCardHolderInfo.addressNumber' => 'required|string',
                    'creditCardHolderInfo.phone' => 'required|string',
                    'customer' => 'required|string',
                    'dueDate' => 'required|string',
                    'value' => 'required|string',
                    'description' => 'required|string',
                    'externalReference' => 'required|string',
                ]
            );
        }
        return $this;
    }
}
