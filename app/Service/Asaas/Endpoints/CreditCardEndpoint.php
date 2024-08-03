<?php

namespace App\Service\Asaas\Endpoints;

use App\Service\Asaas\Entities\CreditCard;
use App\Service\Asaas\Requests\CreateCreditCardRequest;

class CreditCards extends BaseEndpoint
{
       public function create(CreateCreditCardRequest $request) : CreditCard
    {
        return new CreditCard(
            $this->service
                ->api
                ->post('/credit-cards', $request->toArray())
                ->json('data')
        );
    }
}
