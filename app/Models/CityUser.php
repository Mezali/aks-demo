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
 * @property int $city_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\City $city
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|CityUser filter(array $input = [], $filter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|CityUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CityUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CityUser onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CityUser paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|CityUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|CityUser simplePaginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|CityUser sort($sort)
 * @method static \Illuminate\Database\Eloquent\Builder|CityUser whereBeginsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|CityUser whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityUser whereEndsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|CityUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityUser whereLike($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|CityUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityUser whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityUser withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CityUser withoutTrashed()
 * @mixin \Eloquent
 */
class CityUser extends Model
{
    use HasFactory, SoftDeletes, Sortable, Filterable;

    protected $fillable = [
        'city_id',
        'user_id',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
