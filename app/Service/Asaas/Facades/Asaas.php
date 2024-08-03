<?php

namespace App\Service\Asaas\Facades;

use App\Service\Asaas\AsaasService;
use App\Service\Asaas\Endpoints\Accounts;
use App\Service\Asaas\Endpoints\Customers;
use App\Service\Asaas\Endpoints\Payments;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Accounts accounts()
 * @method static Customers customers()
 * @method static Payments payments()
 */
class Asaas extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AsaasService::class;
    }
}
