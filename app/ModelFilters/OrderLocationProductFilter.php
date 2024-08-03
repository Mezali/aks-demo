<?php

namespace App\ModelFilters;

use DB;

class OrderLocationProductFilter extends AbstractFilter
{
    protected $allowedFilters = [
        'id',
        'order_location',
        'driver_id'
    ];

    protected $keywordFields = [
        'addresses.street',
        'addresses.number',
        'addresses.district',
        'cities.name',
        'states.name',
        'states.acronym',
        'stationary_buckets.code',
        'stationary_bucket_types.name',
    ];

    public function driverId(int $driverId)
    {
        return $this->where('order_location_products.driver_id', $driverId);
    }

    public function late(int $late)
    {
        if ($late === 1) return $this->where('order_location_products.delivery_location_date', '<', date('Y-m-d'));
    }

    public function today(int $today)
    {
        if ($today === 1) return $this->where('order_location_products.delivery_location_date', '=', date('Y-m-d'));
    }

    public function lateWithdrawl(int $lateWithdrawl)
    {
        if ($lateWithdrawl === 1) return $this->where('order_location_products.delivery_withdrawl_date', '<', date('Y-m-d'));
    }

    public function todayWithdrawl(int $todayWithdrawl)
    {
        if ($todayWithdrawl === 1) return $this->where('order_location_products.delivery_withdrawl_date', '=', date('Y-m-d'));
    }

    public function withdrawDriverId(int $withdrawDriverId)
    {
        return $this->where('order_location_products.withdraw_driver_id', $withdrawDriverId);
    }

    public function providerId(int $providerId)
    {
        return $this->where('order_locations.provider_id', $providerId);
    }

    public function clientId(int $clientId)
    {
        return $this->where('order_locations.client_id', $clientId);
    }

    public function code(string $code)
    {
        return $this->where('stationary_buckets.code', $code);
    }

    public function status(string $status)
    {
        return $this->where('stationary_buckets.status', $status);
    }

    public function statusIn(array $status)
    {
        return $this->whereIn('stationary_buckets.status', $status);
    }

    public function ref(string $value)
    {
        return $this->where('order_location_products.created_at', '<=', $value.'-31');
    }

    public function timeRef(string $timeRef)
    {        
        return $this->addSelect(
            DB::raw("DATEDIFF(CURDATE(), order_location_products.location_date) AS timedif")
        );       
    }
    
    public function setup()
    {
        parent::setup();
        $this->join('order_locations', 'order_location_products.order_locations_id', '=', 'order_locations.id');
        // $this->join('addresses', 'order_locations.address_id', '=', 'addresses.id');
        // $this->join('cities', 'addresses.city_id', '=', 'cities.id');
        // $this->join('states', 'cities.state_id', '=', 'states.id');
        $this->join('stationary_buckets', 'order_location_products.productable_id', '=', 'stationary_buckets.id');
        // $this->join('stationary_bucket_groups', 'stationary_buckets.stationary_bucket_group_id', '=', 'stationary_bucket_groups.id');
        // $this->join('stationary_bucket_types', 'stationary_bucket_groups.stationary_bucket_type_id', '=', 'stationary_bucket_types.id');
    }
}
