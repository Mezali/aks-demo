<?php

namespace App\Models;

use App\Traits\Sortable;
use EloquentFilter\Filterable;

use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Model,
    SoftDeletes
};

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleType filter(array $input = [], $filter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleType paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleType query()
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleType simplePaginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleType sort($sort)
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleType whereBeginsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleType whereEndsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleType whereLike($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleType withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleType withoutTrashed()
 * @mixin \Eloquent
 */
class VehicleType extends Model
{
    use HasFactory, Sortable, Filterable, SoftDeletes;

    protected $fillable = [
        'name',
    ];
}
