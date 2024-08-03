<?php

namespace App\ModelFilters;

class CartProductFilter extends AbstractFilter
{

    protected $allowedFilters = [
        'id',
    ];
    protected $keywordFields = [ ];

    public function setup()
    {
        parent::setup();
    }
}
