<?php

namespace App\ModelFilters;

class OrderLocationFilter extends AbstractFilter
{
    protected $allowedFilters = [
        'id',
        'status',
        'client',
        'provider'
    ];


    protected $keywordFields = [
        'addresses.street',
        'addresses.number',
        'addresses.district',
        'cities.name',
        'states.name',
        'states.acronym',
        'clients.name',
        'providers.name',
    ];

    public function ref(string $value)
    {
        return $this->where('order_locations.created_at', '<=', $value.'-31');
    }

    public function setup()
    {
        parent::setup();
        $this->join('addresses', 'order_locations.address_id', '=', 'addresses.id');
        $this->join('cities', 'addresses.city_id', '=', 'cities.id');
        $this->join('states', 'cities.state_id', '=', 'states.id');
        $this->join('users as clients', 'order_locations.client_id', '=', 'clients.id');
        $this->join('users as providers', 'order_locations.provider_id', '=', 'providers.id');
    }
}
