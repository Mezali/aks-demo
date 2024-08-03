<?php

namespace App\Service\Asaas\Endpoints;

trait HasAccounts
{
    public function accounts(): Accounts
    {
        return new Accounts();
    }
}
