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
 * @property string $name
 * @property float $m3
 * @property float $letter_a
 * @property float $letter_b
 * @property float $letter_c
 * @property float $letter_d
 * @property float $letter_e
 * @property float $letter_f
 * @property string|null $photo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketType filter(array $input = [], $filter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketType paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketType query()
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketType simplePaginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketType sort($sort)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketType whereBeginsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketType whereEndsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketType whereLetterA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketType whereLetterB($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketType whereLetterC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketType whereLetterD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketType whereLetterE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketType whereLetterF($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketType whereLike($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketType whereM3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketType wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketType withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|StationaryBucketType withoutTrashed()
 * @mixin \Eloquent
 */
class StationaryBucketType extends Model
{
    use HasFactory, Sortable, Filterable, SoftDeletes;

    protected $fillable = [
        'name',
        'm3',
        'letter_a',
        'letter_b',
        'letter_c',
        'letter_d',
        'letter_e',
        'letter_f',
        'photo',
    ];
}
