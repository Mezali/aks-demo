<?php

namespace App\ModelFilters;



class GoalFilter extends AbstractFilter
{

    /**
     * @var array
     */
    protected $allowedFilters = [
        'id',
        'user_id',
        'year'
    ];

    /**
     * @var array
     */
    protected $keywordFields = [ ];

    public function userId(string $userId)
    {
        return $this->where('user_id', '=', $userId);
    }

    public function setup()
    {
        parent::setup();
    }
}
