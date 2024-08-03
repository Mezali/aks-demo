<?php

namespace App\Service\Asaas\Entities;

class Customer
{
    public readonly string $object;
    public readonly string $id;
    public readonly ?string $dateCreated;
    public readonly string $name;
    public readonly ?string $email;
    public readonly ?string $phone;
    public readonly ?string $mobilePhone;
    public readonly ?string $address;
    public readonly ?string $addressNumber;
    public readonly ?string $complement;
    public readonly ?string $province;
    public readonly ?string $postalCode;
    public readonly ?string $cpfCnpj;
    public readonly ?string $personType;
    public readonly ?bool $deleted;
    public readonly ?string $additionalEmails;
    public readonly ?string $externalReference;
    public readonly ?bool $notificationDisabled;
    public readonly ?int $city;
    public readonly ?string $cityName;
    public readonly ?string $state;
    public readonly ?string $country;
    public readonly ?string $observations;

    public function __construct(array $data)
    {
        $this->object = data_get($data, 'object');
        $this->id = data_get($data, 'id');
        $this->dateCreated = data_get($data, 'dateCreated');
        $this->name = data_get($data, 'name');
        $this->email = data_get($data, 'email');
        $this->phone = data_get($data, 'phone');
        $this->mobilePhone = data_get($data, 'mobilePhone');
        $this->address = data_get($data, 'address');
        $this->addressNumber = data_get($data, 'addressNumber');
        $this->complement = data_get($data, 'complement');
        $this->province = data_get($data, 'province');
        $this->postalCode = data_get($data, 'postalCode');
        $this->cpfCnpj = data_get($data, 'cpfCnpj');
        $this->personType = data_get($data, 'personType');
        $this->deleted = data_get($data, 'deleted');
        $this->additionalEmails = data_get($data, 'additionalEmails');
        $this->externalReference = data_get($data, 'externalReference');
        $this->notificationDisabled = data_get($data, 'notificationDisabled');
        $this->city = data_get($data, 'city');
        $this->cityName = data_get($data, 'cityName');
        $this->state = data_get($data, 'state');
        $this->country = data_get($data, 'country');
        $this->observations = data_get($data, 'observations');
    }
}
