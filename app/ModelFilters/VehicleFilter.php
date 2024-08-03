<?php

namespace App\ModelFilters;



class VehicleFilter extends AbstractFilter
{

    /**
     * @var array
     */
    protected $allowedFilters = [
        'id',
        'vehicleType',
        'status'
    ];

    /**
     * @var array
     */
    protected $keywordFields = [
        'vehicles.plate',
        'vehicles.renavam',
        'vehicles.brand',
        'vehicles.model',
        'vehicle_types.name',
    ];

    public function userId(int $userId) {
        $this->where('user_id', $userId);
    }

    public function setup()
    {
        parent::setup();
        $this->join('vehicle_types', 'vehicles.vehicle_type_id', '=', 'vehicle_types.id');
    }
}
