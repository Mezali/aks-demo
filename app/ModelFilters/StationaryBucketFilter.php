<?php

namespace App\ModelFilters;

class StationaryBucketFilter extends AbstractFilter
{
    protected $allowedFilters = [
        'id',
        'group',
        'user',
    ];

    protected $keywordFields = [
        'stationary_buckets.id',
        'stationary_buckets.user_id',
        'stationary_buckets.code',
    ];

    protected $columnMap = [
        'group' => 'stationary_bucket_group_id',
    ];

    public function statusIn(array $statusIn)
    {
        return $this->whereIn('status', $statusIn);
    }

    public function status(string $status)
    {
        return $this->where('status', $status);
    }

    public function ref(string $value)
    {
        return $this->where('stationary_buckets.created_at', '<=', $value.'-31');
    }

    public function setup()
    {
        parent::setup();
    }
}
