<?php

namespace App\Service\Asaas\Endpoints;

use App\Service\Asaas\Entities\Customer;
use App\Service\Asaas\Requests\CreateCustomerRequest;
use Illuminate\Support\Collection;

class Customers extends BaseEndpoint
{
    public function create(CreateCustomerRequest $request): Customer
    {
        $response = $this->service
            ->api
            ->post('/customers', $request->validated()->toArray());
        // ->json('data')        
        return new Customer($response->json());
    }

    public function all(): Collection
    {
        return $this->transform(
            $this->service
                ->api
                ->get('/customers')
                ->json('data'),
            Customer::class
        );
    }

    public function get(int $id): Customer
    {
        return new Customer(
            $this->service
                ->api
                ->get("/customers/{$id}")
                ->json('data')
        );
    }

    public function update(int $id, CreateCustomerRequest $request): Customer
    {
        return new Customer(
            $this->service
                ->api
                ->put("/customers/{$id}", $request->validated())
                ->json('data')
        );
    }
}
