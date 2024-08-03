<?php

namespace App\Service\Asaas\Endpoints;

use App\Service\Asaas\Entities\Account;
use App\Service\Asaas\Requests\CreateAccountRequest;
use Illuminate\Support\Collection;

class Accounts extends BaseEndpoint
{
    public function create(CreateAccountRequest $request): Account
    {
        return new Account(
            $this->service
                ->api
                ->post('/accounts', $request->validated())
                ->json('data')
        );
    }
}
