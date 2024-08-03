<?php

namespace App\ModelFilters;

class OrderLocationProductGalleryFilter extends AbstractFilter
{
    protected $allowedFilters = [
        'id',
        'order_location_product',
        'status',

    ];

    protected $keywordFields = [];

    public function status(string $status)
    {
        return $this->where('status', $status);
    }

    public function orderLocationProductId(string $orderLocationProductId)
    {
        return $this->where('order_location_product_id', $orderLocationProductId);
    }


    public function setup()
    {
        parent::setup();
    }
}
