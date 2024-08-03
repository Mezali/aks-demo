<?php 

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class PermissionGroupFilter extends AbstractFilter
{
    protected $allowedFilters = [
        'id',
    ];
    protected $keywordFields = [
        'cities.name',
        'states.name',
        'states.acronym',
    ];

    public function setup(){
        parent::setup();
    }
}
