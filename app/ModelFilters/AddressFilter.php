<?php

namespace App\ModelFilters;

use MatanYadaev\EloquentSpatial\Objects\Point;

class AddressFilter extends AbstractFilter
{
    protected $allowedFilters = [
        'id',
        'user'
    ];

    protected $keywordFields = [
        'street',
        'district',
        'name',
        'cities.name',
        'states.name',
        'states.acronym',
    ];

    public function distance($data)
    {

        $point = new Point(floatval($data[0]), floatval($data[1]));
        $this->orderByDistanceSphere('location', $point);
        $this->withDistanceSphere('location', $point, 'distance');
        ds($this->query->toSql());
        return $this;
    }

    public function city(int $city)
    {
        return $this->where('city_id', $city);
    }

    public function active(int $active)
    {
        return $this->where('active', $active);
    }

    public function default(int $default)
    {
        return $this->where('default', $default);
    }

    public function provider(int $provider)
    {
        if ($provider > 0) {
            $this->whereHas('cityUsers', function ($query) use ($provider) {
                $query->where('user_id', $provider);
            });
        }
        return $this;
    }

    public function setup()
    {
        parent::setup();
        $this->join('cities', 'cities.id', '=', 'addresses.city_id');
        $this->join('states', 'states.id', '=', 'cities.state_id');
    }
}
