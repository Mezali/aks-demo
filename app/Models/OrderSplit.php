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
 * @property int $order_id
 * @property int $user_id
 * @property string $type
 * @property string $comission
 * @property string $transaction_cost
 * @property string $platform_cost
 * @property string $total
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSplit filter(array $input = [], $filter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSplit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSplit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSplit onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSplit paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSplit query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSplit simplePaginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSplit sort($sort)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSplit whereBeginsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSplit whereComission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSplit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSplit whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSplit whereEndsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSplit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSplit whereLike($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSplit whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSplit wherePlatformCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSplit whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSplit whereTransactionCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSplit whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSplit whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSplit whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSplit withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderSplit withoutTrashed()
 * @mixin \Eloquent
 */
class OrderSplit extends Model
{
    use HasFactory, SoftDeletes, Sortable, Filterable;

    protected $fillable = [
        'order_id',
        'user_id',
        'type',
        'comission',
        'transaction_cost',
        'platform_cost',
        'total'
    ];
}
