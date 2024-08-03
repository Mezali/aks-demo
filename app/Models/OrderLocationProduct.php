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
 * @property int $order_locations_id
 * @property string $productable_type
 * @property int $productable_id
 * @property int|null $driver_id
 * @property string|null $location_date
 * @property string|null $withdraw_date
 * @property string|null $delivery_location_date
 * @property string|null $delivery_withdrawl_date
 * @property string|null $final_data
 * @property string|null $status
 * @property int|null $withdraw_driver_id
 * @property int|null $withdraw_vehicle_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $vehicle_id
 * @property-read \App\Models\User|null $driverLocation
 * @property-read \App\Models\User|null $driverWithdraw
 * @property-read \App\Models\OrderLocation $orderLocations
 * @property-read Model|\Eloquent $product
 * @property-read \App\Models\Vehicle|null $vehicleLocation
 * @property-read \App\Models\Vehicle|null $vehicleWithdraw
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct filter(array $input = [], $filter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct simplePaginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct sort($sort)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct whereBeginsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct whereDeliveryLocationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct whereDeliveryWithdrawlDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct whereDriverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct whereEndsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct whereFinalData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct whereLike($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct whereLocationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct whereOrderLocationsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct whereProductableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct whereProductableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct whereVehicleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct whereWithdrawDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct whereWithdrawDriverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct whereWithdrawVehicleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProduct withoutTrashed()
 * @mixin \Eloquent
 */
class OrderLocationProduct extends Model
{
    use HasFactory, Filterable, Sortable, SoftDeletes;


    protected $fillable = [
        'order_location_id',
        'product_id',
        'driver_id',
        'vehicle_id',
        'location_date',
        'withdraw_date',
        'delivery_withdrawl_date',
        'delivery_location_date',
        'final_data',
        'withdraw_driver_id',
        'withdraw_vehicle_id',
        'productable_type',
        'productable_id',
        'order_locations_id',
        'status',
        'type_destination',
        'destination_id',
    ];

    public function product()
    {
        return $this->morphTo('productable');
    }

    public function orderLocations()
    {
        return $this->belongsTo(OrderLocation::class, 'order_locations_id');
    }

    public function driverLocation()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }

    public function vehicleLocation()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    public function driverWithdraw()
    {
        return $this->belongsTo(User::class, 'withdraw_driver_id');
    }

    public function vehicleWithdraw()
    {
        return $this->belongsTo(Vehicle::class, 'withdraw_vehicle_id');
    }

}
