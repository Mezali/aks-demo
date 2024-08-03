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
 * @property int $user_id
 * @property int|null $order_split_id
 * @property string $operation_type
 * @property string $amount
 * @property string $balance
 * @property int $compensate_on_locate
 * @property int $compensated
 * @property string|null $compensated_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceOperation filter(array $input = [], $filter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceOperation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceOperation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceOperation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceOperation paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceOperation query()
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceOperation simplePaginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceOperation sort($sort)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceOperation whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceOperation whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceOperation whereBeginsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceOperation whereCompensateOnLocate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceOperation whereCompensated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceOperation whereCompensatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceOperation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceOperation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceOperation whereEndsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceOperation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceOperation whereLike($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceOperation whereOperationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceOperation whereOrderSplitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceOperation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceOperation whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceOperation withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceOperation withoutTrashed()
 * @mixin \Eloquent
 */
class BalanceOperation extends Model
{
    use HasFactory, SoftDeletes, Sortable, Filterable;
}
