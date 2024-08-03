<?php

namespace App\ModelFilters;

class CityFilter extends AbstractFilter
{

    protected $allowedFilters = [
        'id',
    ];
    protected $keywordFields = [
        'cities.name',
        'cities.ibge_code',
        'states.name',
        'states.acronym',
    ];

    public function uf(string $uf)
    {
        return $this->where('states.acronym', $uf);
    }

    public function state(int $id)
    {
        return $this->where('cities.state_id', $id);
    }

    public function city(string $city)
    {
        return $this->where('cities.name', $city);
    }


    public function setup()
    {
        parent::setup();
        $this->join('states', 'cities.state_id', '=', 'states.id');
        $this->with('state');
    }
}
