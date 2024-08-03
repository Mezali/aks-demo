<?php

namespace App\Service\Asaas\Entities;

class CreditCard {
    public readonly string $object;
    public readonly string $id;
    public readonly string $dateCreated;
    public readonly string $customer;
    public readonly ?string $paymentLink;
    public readonly string $dueDate;
    public readonly float $value;
    public readonly float $netValue;
    public readonly string $billingType;
    public readonly ?string $pixTransaction;
    public readonly string $status;
    public readonly ?string $description;
    public readonly ?string $externalReference;
    public readonly ?string $confirmedDate;
    public readonly ?float $originalValue;
    public readonly ?float $interestValue;
    public readonly string $originalDueDate;
    public readonly ?string $paymentDate;
    public readonly ?string $clientPaymentDate;
    public readonly ?int $installmentNumber;
    public readonly ?string $transactionReceiptUrl;
    public readonly ?string $nossoNumero;
    public readonly ?string $invoiceUrl;
    public readonly ?string $bankSlipUrl;
    public readonly string $invoiceNumber;
    public readonly ?array $discount;
    public readonly ?array $fine;
    public readonly ?array $interest;
    public readonly bool $deleted;
    public readonly bool $postalService;
    public readonly bool $anticipated;
    public readonly bool $anticipable;
    public readonly ?array $creditCard;

    public function __construct(array $data){

        $this->object = data_get($data, 'object');
        $this->id = data_get($data, 'id');
        $this->dateCreated = data_get($data, 'dateCreated');
        $this->customer = data_get($data, 'customer');
        $this->paymentLink = data_get($data, 'paymentLink');
        $this->dueDate = data_get($data, 'dueDate');
        $this->value = data_get($data, 'value');
        $this->netValue = data_get($data, 'netValue');
        $this->billingType = data_get($data, 'billingType');
        $this->pixTransaction = data_get($data, 'pixTransaction');
        $this->status = data_get($data, 'status');
        $this->description = data_get($data, 'description');
        $this->externalReference = data_get($data, 'externalReference');
        $this->confirmedDate = data_get($data, 'confirmedDate');
        $this->originalValue = data_get($data, 'originalValue');
        $this->interestValue = data_get($data, 'interestValue');
        $this->originalDueDate = data_get($data, 'originalDueDate');
        $this->paymentDate = data_get($data, 'paymentDate');
        $this->clientPaymentDate = data_get($data, 'clientPaymentDate');
        $this->installmentNumber = data_get($data, 'installmentNumber');
        $this->transactionReceiptUrl = data_get($data, 'transactionReceiptUrl');
        $this->nossoNumero = data_get($data, 'nossoNumero');
        $this->invoiceUrl = data_get($data, 'invoiceUrl');
        $this->bankSlipUrl = data_get($data, 'bankSlipUrl');
        $this->invoiceNumber = data_get($data, 'invoiceNumber');
        $this->discount = data_get($data, 'discount');
        $this->fine = data_get($data, 'fine');
        $this->interest = data_get($data, 'interest');
        $this->deleted = data_get($data, 'deleted');
        $this->postalService = data_get($data, 'postalService');
        $this->anticipated = data_get($data, 'anticipated');
        $this->anticipable = data_get($data, 'anticipable');
        $this->creditCard = data_get($data, 'creditCard');
    }
  
  };

 