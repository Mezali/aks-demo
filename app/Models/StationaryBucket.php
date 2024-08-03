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
 * @property int $user_id
 * @property string $code
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\StationaryBucketGroup $stationaryBucketGroup
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucket filter(array $input = [], $filter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucket onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucket paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucket query()
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucket simplePaginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucket sort($sort)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucket whereBeginsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucket whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucket whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucket whereEndsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucket whereLike($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucket whereStationaryBucketGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucket whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucket whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucket withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucket withoutTrashed()
 * @mixin \Eloquent
 */
class StationaryBucket extends Model
{
    use HasFactory, Filterable, Sortable, SoftDeletes;

    protected $fillable = [
        'stationary_bucket_group_id',        
        'id',
        'code',
        'status' 
    ];

    public function stationaryBucketGroup()
    {
        return $this->belongsTo(StationaryBucketGroup::class, 'stationary_bucket_group_id');
    }

}
