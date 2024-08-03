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
 * @property int $stationary_bucket_id
 * @property int $user_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketHistory filter(array $input = [], $filter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketHistory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketHistory paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketHistory simplePaginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketHistory sort($sort)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketHistory whereBeginsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketHistory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketHistory whereEndsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketHistory whereLike($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketHistory whereStationaryBucketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketHistory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketHistory whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketHistory withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketHistory withoutTrashed()
 * @mixin \Eloquent
 */
class StationaryBucketHistory extends Model
{
    use HasFactory, Filterable, Sortable, SoftDeletes;
}
