<?php

namespace App\Service\Asaas\Endpoints;

trait HasCustomers
{
    public function customers(): Customers
    {
        return new Customers();
    }
}
