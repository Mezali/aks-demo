<?php

namespace App\Service\Asaas\Endpoints;

use App\Service\Asaas\Entities\Payment;
use App\Service\Asaas\Requests\ChargeRequest;
use Log;

class Payments extends BaseEndpoint
{
    public function createCharge(ChargeRequest $request)
    {

        try {
            $response = $this->service
                ->api
                ->post('/payments', $request->toArray())
                ->json();            
            return new Payment($response);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
