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
 * @property int|null $order_location_product_id
 * @property int|null $driver_id
 * @property int|null $vehicle_id
 * @property string|null $status
 * @property string|null $start_date
 * @property string|null $end_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Mtr filter(array $input = [], $filter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Mtr newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mtr newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mtr onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Mtr paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Mtr query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mtr simplePaginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Mtr sort($sort)
 * @method static \Illuminate\Database\Eloquent\Builder|Mtr whereBeginsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Mtr whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mtr whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mtr whereDriverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mtr whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mtr whereEndsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Mtr whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mtr whereLike($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Mtr whereOrderLocationProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mtr whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mtr whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mtr whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mtr whereVehicleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mtr withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Mtr withoutTrashed()
 * @mixin \Eloquent
 */
class Mtr extends Model
{
    use HasFactory, SoftDeletes, Filterable, Sortable;
}
