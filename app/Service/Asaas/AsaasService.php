<?php

namespace App\Service\Asaas;


use App\Service\Asaas\Endpoints\HasAccounts;
use App\Service\Asaas\Endpoints\HasCustomers;
use App\Service\Asaas\Endpoints\HasPayments;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class AsaasService
{
    use HasAccounts;
    use HasCustomers;
    use HasPayments;

    public PendingRequest $api;

    public function __construct()
    {
        $this->api = Http::withHeaders([
            'access_token' => env('ASAAS_TOKEN'),
            'Content-Type' => 'application/json',
        ])->baseUrl(env('ASAAS_URL'));
    }
}
