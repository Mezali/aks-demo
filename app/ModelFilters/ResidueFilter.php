<?php

namespace App\ModelFilters;



class ResidueFilter extends AbstractFilter
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
        'name',
        'description'
    ];

    public function setup()
    {
        parent::setup();
    }
}
