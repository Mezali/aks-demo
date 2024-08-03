<?php

namespace App\Service\Asaas\Endpoints;

trait HasPayments
{
    public function payments(): Payments
    {
        return new Payments();
    }
}
