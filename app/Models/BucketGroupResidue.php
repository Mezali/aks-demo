<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Model
};

/**
 * 
 *
 * @property int $id
 * @property int $stationary_bucket_group_id
 * @property int $residue_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Residue> $residue
 * @property-read int|null $residue_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\StationaryBucketGroup> $stationary_bucket_group
 * @property-read int|null $stationary_bucket_group_count
 * @method static \Illuminate\Database\Eloquent\Builder|BucketGroupResidue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BucketGroupResidue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BucketGroupResidue query()
 * @method static \Illuminate\Database\Eloquent\Builder|BucketGroupResidue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BucketGroupResidue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BucketGroupResidue whereResidueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BucketGroupResidue whereStationaryBucketGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BucketGroupResidue whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BucketGroupResidue extends Model
{
    use HasFactory;

    protected $fillable = [        
        'residue_id',
        'stationary_bucket_group_id',
    ];

    public function residue()
    {
        return $this->belongsToMany(Residue::class);
    }

    public function stationary_bucket_group()
    {
        return $this->belongsToMany(StationaryBucketGroup::class);
    }
}
