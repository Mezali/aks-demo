<?php

namespace App\ModelFilters;

class StateFilter extends AbstractFilter
{
    protected $allowedFilters = [
        'id',
    ];

    protected $keywordFields = [
        'name',
        'acronym',
        'ibge_code'
    ];

    public function setup()
    {
        parent::setup();
    }
}
