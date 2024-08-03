<?php

namespace App\ModelFilters;

use App\Enums\ProfileTypeEnum;
use App\Models\Address;
use Illuminate\Support\Facades\DB;

class UserFilter extends AbstractFilter
{
    protected $allowedFilters = [
        'id',
        'city',
        'state',
    ];

    protected $keywordFields = [
        'name',
        'document_number',
        'cnh',
        'cities.name',
        'states.name',
    ];

    /**
     * @var array
     */
    protected $columnMap = [
        'state' => 'states.id',
        'city' => 'cities.id',
    ];

    public function profileType(array $types)
    {
        return $this->whereHas('profiles', function ($query) use ($types) {
            $query->whereIn('type', $types);
        });
    }

    public function company(int $id)
    {
        return $this->whereHas('profiles', function ($query) use ($id) {
            $query->where('company_id', $id);
        });
    }

    public function finalDestination()
    {
        $this->whereHas('profiles', function ($query) {
            $query->whereIn('type', [ProfileTypeEnum::FINAL_DESTINATION(), ProfileTypeEnum::LEGAL_FINAL_DESTINATION()]);
        });

        return $this;
    }

    public function provider()
    {
        $this->whereHas('profiles', function ($query) {
            $query->whereIn('type', [ProfileTypeEnum::SELLER(), ProfileTypeEnum::LEGAL_SELLER()]);
        });

        return $this;
    }

    public function client()
    {
        return $this->whereHas('profiles', function ($query) {
            $query->whereIn('type', [ProfileTypeEnum::CUSTOMER(), ProfileTypeEnum::LEGAL_CUSTOMER()]);
        });
    }

    public function cityId(int $cityId) {
        return $this->whereHas('city', function ($query) use($cityId) {
            $query->where('city_id', $cityId);
        });
    }

    public function system()
    {
        return $this->whereHas('profiles', function ($query)  {
            $query->whereIn('type', [ProfileTypeEnum::ADMIN()]);
        });
    }

    public function ref(string $value)
    {
        return $this->where('users.created_at', '<=', $value . '-31');
    }

    public function addressRef(int $addressId)
    {        
        
        $address = Address::find($addressId);

        return $this->addSelect(
            DB::raw("ST_DISTANCE_SPHERE(
                        ST_GeomFromText(CONCAT('POINT(', ad.latitude, ' ', ad.longitude , ')')),
                        ST_GeomFromText('POINT($address->latitude $address->longitude)')
                    ) AS distance")
        )->join('addresses as ad', function ($join) {
            $join->on('users.id', '=', 'ad.user_id')
                ->whereRaw('ad.active = 1');
        });        
    }

    public function maxDistance(int $distance)
    {
        return $this->whereRaw('distance <= ' . $distance);
    }

    public function setup()
    {
        parent::setup();
        $this->join('profiles', 'profiles.user_id', '=', 'users.id');
        $this->leftJoin('addresses', function ($join) {
            $join->on('addresses.user_id', '=', 'users.id');
            $join->where('addresses.active', '=', 1);
        });
        $this->leftJoin('cities', 'cities.id', '=', 'addresses.city_id');
        $this->leftJoin('states', 'states.id', '=', 'cities.state_id');
    }
}
