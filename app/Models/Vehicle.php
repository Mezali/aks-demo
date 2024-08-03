<?php

namespace App\Models;

use App\Traits\Sortable;
use EloquentFilter\Filterable;

use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Relations\BelongsTo,
    Model,
    SoftDeletes
};

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $vehicle_type_id
 * @property string $renavam
 * @property int $year_manufacture
 * @property int $year_model
 * @property string $brand
 * @property string $model
 * @property string|null $version
 * @property string $fuel
 * @property string|null $motor
 * @property float|null $total_gross_weight
 * @property string $plate
 * @property float|null $capacity
 * @property string|null $axles
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\VehicleType $vehicleType
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle filter(array $input = [], $filter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle query()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle simplePaginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle sort($sort)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereAxles($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereBeginsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereEndsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereFuel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereLike($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereMotor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle wherePlate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereRenavam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereTotalGrossWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereVehicleTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereYearManufacture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereYearModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle withoutTrashed()
 * @mixin \Eloquent
 */
class Vehicle extends Model
{
    use HasFactory, Sortable, Filterable, SoftDeletes;

    protected $fillable = [
        'name',
        'user_id',
        'weight',
        'axles',
        'status',
        'vehicle_type_id',
        'renavam',
        'year_manufacture',
        'year_model',
        'brand',
        'model',
        'version',
        'fuel',
        'motor',
        'total_gross_weight',
        'plate',
        'capacity',
    ];

    public function getStatus () {
        switch ($this->status) {
            case 'D': return 'Disponível';
            case 'R': return 'Reservado';
            case 'ET': return 'Em Trânsito';
            default: return 'Status erro';
        }
    }

    public function vehicleType(): BelongsTo
    {
        return $this->belongsTo(VehicleType::class);
    }

}
