<?php

namespace App\Models;

use App\Traits\Sortable;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 
 *
 * @property int $id
 * @property int $stationary_bucket_group_id
 * @property string $url
 * @property int $is_main
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGallery filter(array $input = [], $filter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGallery onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGallery paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGallery simplePaginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGallery sort($sort)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGallery whereBeginsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGallery whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGallery whereEndsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGallery whereIsMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGallery whereLike($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGallery whereStationaryBucketGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGallery whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGallery whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGallery withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketGallery withoutTrashed()
 * @mixin \Eloquent
 */
class StationaryBucketGallery extends Model
{
    use HasFactory, Filterable, Sortable, SoftDeletes;


    protected $fillable = [
        'id',
        'stationary_bucket_group_id',
        'url',
        'is_main' 
    ];
}
