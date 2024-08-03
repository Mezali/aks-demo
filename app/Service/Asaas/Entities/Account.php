<?php

namespace App\Service\Asaas\Entities;

class Account
{
    public readonly string $object;
    public readonly string $id;
    public readonly string $name;
    public readonly string $email;
    public readonly string $loginEmail;
    public readonly string $phone;
    public readonly string $mobilePhone;
    public readonly string $address;
    public readonly string $addressNumber;
    public readonly string $complement;
    public readonly string $province;
    public readonly string $postalCode;
    public readonly string $cpfCnpj;
    public readonly string $birthDate;
    public readonly string $personType;
    public readonly string $companyType;
    public readonly int $city;
    public readonly string $state;
    public readonly string $country;
    public readonly string $tradingName;
    public readonly string $site;
    public readonly string $incomeRange;
    public readonly string $apiKey;
    public readonly string $walletId;
    public readonly array $accountNumber;

    public function __construct(array $data)
    {
        $this->object = data_get($data, 'object');
        $this->id = data_get($data, 'id');
        $this->name = data_get($data, 'name');
        $this->email = data_get($data, 'email');
        $this->loginEmail = data_get($data, 'loginEmail');
        $this->phone = data_get($data, 'phone');
        $this->mobilePhone = data_get($data, 'mobilePhone');
        $this->address = data_get($data, 'address');
        $this->addressNumber = data_get($data, 'addressNumber');
        $this->complement = data_get($data, 'complement');
        $this->province = data_get($data, 'province');
        $this->postalCode = data_get($data, 'postalCode');
        $this->cpfCnpj = data_get($data, 'cpfCnpj');
        $this->birthDate = data_get($data, 'birthDate');
        $this->personType = data_get($data, 'personType');
        $this->companyType = data_get($data, 'companyType');
        $this->city = data_get($data, 'city');
        $this->state = data_get($data, 'state');
        $this->country = data_get($data, 'country');
        $this->tradingName = data_get($data, 'tradingName');
        $this->site = data_get($data, 'site');
        $this->incomeRange = data_get($data, 'incomeRange');
        $this->apiKey = data_get($data, 'apiKey');
        $this->walletId = data_get($data, 'walletId');
        $this->accountNumber = data_get($data, 'accountNumber');
    }
}
