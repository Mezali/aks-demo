<?php

namespace App\ModelFilters;



class VehicleTypeFilter extends AbstractFilter
{

    /**
     * @var array
     */
    protected $allowedFilters = [
        'id'
    ];

    /**
     * @var array
     */
    protected $keywordFields = [
        'name'
    ];

    public function setup()
    {
        parent::setup();
    }
}
