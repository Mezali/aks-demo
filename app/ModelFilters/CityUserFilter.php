<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class CityUserFilter extends AbstractFilter
{
    protected $allowedFilters = [
        'id',
        'city',
        'user',
    ];

    public function setup()
    {
        parent::setup();
    }
}
