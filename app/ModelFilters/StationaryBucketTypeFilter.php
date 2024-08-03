<?php

namespace App\ModelFilters;

class StationaryBucketTypeFilter extends AbstractFilter
{
    protected $allowedFilters = [
        'id',
    ];


    protected $keywordFields = [
        'name',
    ];


    public function m3(int $value)
    {
        return $this->where('m3', '>=', $value);
    }

    public function setup()
    {
        parent::setup();
    }
}
