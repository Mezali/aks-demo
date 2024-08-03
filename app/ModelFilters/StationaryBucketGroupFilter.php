<?php

namespace App\ModelFilters;

use App\Models\Address;

use Illuminate\Support\Facades\{
    DB,
    Request
};

class StationaryBucketGroupFilter extends AbstractFilter
{
    protected $allowedFilters = [
        'id',
        'user_id'
    ];

    protected $keywordFields = [
        'color',
        'material',
        'stationary_bucket_types.name',
        'users.name'
    ];

    public function userId(int $userId)
    {
        return $this->where('user_id', $userId);
    }

    public function type(int $type)
    {
        return $this->where('stationary_bucket_type_id', $type);
    }

    public function typeLid(string $typeLid)
    {
        return $this->where('type_lid', $typeLid);
    }

    public function cityId(int $cityId)
    {
        return $this->whereHas('city', function ($query) use ($cityId) {
            $query->where('city_id', $cityId);
        });
    }

    public function provider(int $provider)
    {
        return $this->where('stationary_bucket_groups.user_id', $provider);
    }

    public function typeLocal(string $typeLocal)
    {
        if ($typeLocal == 'I') {
            return $this->whereIn('type_local', ['I', 'B']);
        }
        if ($typeLocal == 'E') {
            return $this->whereIn('type_local', ['E', 'B']);
        }
        return $this;
    }

    public function priceExternal(array $priceExternal)
    {
        return $this->where(function($query) use($priceExternal) {
            $query->whereBetween('price_external', $priceExternal);
            $query->orWhere('price_external', null);
        });
    }

    public function priceInternal(array $priceInternal)
    {
        return $this->where(function($query) use($priceInternal) {
            $query->whereBetween('price_internal', $priceInternal);
            $query->orWhere('price_internal', null);
        });
    }

    public function addressRef(int $addressId)
    {
        $address = Address::find($addressId);
        $this->addSelect(
            DB::raw("ST_DISTANCE_SPHERE(
                        ST_GeomFromText(CONCAT('POINT(', addresses.latitude, ' ', addresses.longitude , ')')),
                        ST_GeomFromText('POINT($address->latitude $address->longitude)')
                    ) AS distance")
        )->join('addresses', function ($join) {
            $join->on('stationary_bucket_groups.user_id', '=', 'addresses.user_id')
                ->whereRaw('addresses.active = 1');
        });

        return $this;
    }

    public function residue(array|string $residues) {
        return $this->whereHas('residuesBucket', function ($query) use ($residues) {
            $query->whereIn('residue_id', is_array($residues) ? $residues : [ $residues ]);
        });
    }

    public function setup()
    {
        parent::setup();
        $this->join('stationary_bucket_types', 'stationary_bucket_groups.stationary_bucket_type_id', '=', 'stationary_bucket_types.id');
        $this->join('users', 'stationary_bucket_groups.user_id', '=', 'users.id');
    }
}
