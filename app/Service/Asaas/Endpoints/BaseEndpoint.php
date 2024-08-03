<?php

namespace App\Service\Asaas\Endpoints;

use App\Service\Asaas\AsaasService;
use Illuminate\Support\Collection;

class BaseEndpoint
{
    protected AsaasService $service;

    public function __construct()
    {
        $this->service = new AsaasService();
    }

    protected function transform(mixed $json, string $entity): Collection
    {
        return collect($json)
            ->map(fn ($object) => new $entity($object));
    }
}
