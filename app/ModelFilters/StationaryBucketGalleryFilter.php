<?php

namespace App\ModelFilters;

class StationaryBucketGalleryFilter extends AbstractFilter
{
    protected $allowedFilters = [
        'id',
    ];

    protected $keywordFields = [
        'stationary_bucket_gallery.id',
        'stationary_bucket_gallery.url',
    ];


    public function groupId(int $groupId)
    {
        return $this->where('stationary_bucket_group_id', $groupId);
    }

    public function setup()
    {
        parent::setup();
    }
}
