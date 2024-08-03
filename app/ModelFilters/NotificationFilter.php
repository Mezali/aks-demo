<?php

namespace App\ModelFilters;

use MatanYadaev\EloquentSpatial\Objects\Point;

class NotificationFilter extends AbstractFilter
{
    protected $allowedFilters = [
        'id',
    ];

    protected $keywordFields = [];

    public function status(string $status)
    {
        return $this->where('status', $status);
    }

    public function userToId(int $userToId)
    {
        return $this->where('user_to_id', $userToId);
    }

    public function setup()
    {
        parent::setup();
    }
}
