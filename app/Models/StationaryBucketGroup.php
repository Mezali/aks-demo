<?php

namespace App\Models;

use App\Traits\Sortable;
use EloquentFilter\Filterable;
use MatanYadaev\EloquentSpatial\Traits\HasSpatial;

use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Relations\BelongsToMany,
    Relations\HasMany,
    Relations\HasManyThrough,
    Model,
    SoftDeletes
};

/**
 * 
 *
 * @property int $id
 * @property int $stationary_bucket_type_id
 * @property int $user_id
 * @property string $color
 * @property string $material
 * @property float $weight
 * @property string $type_lid
 * @property string $type_local
 * @property float|null $price_internal
 * @property float|null $price_external
 * @property int $days_internal
 * @property int $days_external
 * @property int $pending_deliveries
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CityUser> $city
 * @property-read int|null $city_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\StationaryBucketGallery> $gallery
 * @property-read int|null $gallery_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Residue> $residues
 * @property-read int|null $residues_count
 * @property-read \App\Models\StationaryBucketType $stationaryBucketType
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\StationaryBucket> $stationaryBuckets
 * @property-read int|null $stationary_buckets_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup filter(array $input = [], $filter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup orderByDistance(\Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $column, \Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn, string $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup orderByDistanceSphere(\Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $column, \Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn, string $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup simplePaginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup sort($sort)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup whereBeginsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup whereContains(\Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $column, \Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup whereCrosses(\Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $column, \Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup whereDaysExternal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup whereDaysInternal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup whereDisjoint(\Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $column, \Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup whereDistance(\Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $column, \Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn, string $operator, int|float $value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup whereDistanceSphere(\Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $column, \Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn, string $operator, int|float $value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup whereEndsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup whereEquals(\Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $column, \Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup whereIntersects(\Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $column, \Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup whereLike($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup whereMaterial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup whereNotContains(\Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $column, \Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup whereNotWithin(\Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $column, \Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup whereOverlaps(\Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $column, \Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup wherePendingDeliveries($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup wherePriceExternal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup wherePriceInternal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup whereSrid(\Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $column, string $operator, int|float $value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup whereStationaryBucketTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup whereTouches(\Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $column, \Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup whereTypeLid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup whereTypeLocal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup whereWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup whereWithin(\Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $column, \Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup withCentroid(\Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $column, string $alias = 'centroid')
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup withDistance(\Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $column, \Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn, string $alias = 'distance')
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup withDistanceSphere(\Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $column, \Illuminate\Contracts\Database\Query\Expression|\MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn, string $alias = 'distance')
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGroup withoutTrashed()
 * @mixin \Eloquent
 */
class StationaryBucketGroup extends Model
{
    use HasFactory, Sortable, Filterable, SoftDeletes, HasSpatial;


    protected $fillable = [
        'stationary_bucket_type_id',
        'user_id',
        'color',
        'material',
        'weight',
        'type_lid',
        'type_local',
        'price_internal',
        'price_external',
        'days_internal',
        'days_external',
        'pending_deliveries'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function provider() 
    {
        return $this->user();
    }

    public function stationaryBucketType()
    {
        return $this->belongsTo(StationaryBucketType::class, 'stationary_bucket_type_id');
    }

    public function gallery()
    {
        return $this->hasMany(StationaryBucketGallery::class, 'stationary_bucket_group_id');
    }

    public function stationaryBuckets()
    {
        return $this->hasMany(StationaryBucket::class, 'stationary_bucket_group_id');
    }

    public function disponibleStationaryBuckets()
    {
        return $this->stationaryBuckets->where('status', 'D')->count();
    }

    public function stock()
    {
        return $this->disponibleStationaryBuckets();
    }   

    public function residues(): BelongsToMany
    {
        return $this->belongsToMany(Residue::class, 'bucket_group_residues');
    }

    public function residuesBucket(): HasMany
    {
        return $this->hasMany(BucketGroupResidue::class, 'stationary_bucket_group_id');
    }

    public function city(): HasManyThrough
    {
        return $this->hasManyThrough(CityUser::class, User::class, 'id', 'user_id', 'user_id', 'id');
    }
}
