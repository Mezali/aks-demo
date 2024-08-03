<?php

namespace App\Models;

use App\Traits\Sortable;
use EloquentFilter\Filterable;
use NunoMaduro\Collision\Provider;

use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Model,
    SoftDeletes
};

/**
 * 
 *
 * @property int $id
 * @property int $client_id
 * @property int $user_id
 * @property int $provider_id
 * @property int $cart_product_id
 * @property string $status
 * @property int $order_id
 * @property int $days
 * @property string $price
 * @property int $quantity
 * @property int $address_id
 * @property string $type_local
 * @property int|null $address_final_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\CartProduct $cartProduct
 * @property-read \App\Models\User $client
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderLocationProduct> $items
 * @property-read int|null $items_count
 * @property-read \App\Models\User $provider
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocation filter(array $input = [], $filter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocation paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocation query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocation simplePaginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocation sort($sort)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocation whereAddressFinalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocation whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocation whereBeginsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocation whereCartProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocation whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocation whereDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocation whereEndsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocation whereLike($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocation whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocation wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocation whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocation whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocation whereTypeLocal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocation whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocation withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocation withoutTrashed()
 * @mixin \Eloquent
 */
class OrderLocation extends Model
{
    use HasFactory, SoftDeletes, Sortable, Filterable;

    protected $fillable = [
        'order_id',
        'client_id',
        'provider_id',
        'produtable_type',
        'produtable_id',
        'status',
        'type_local',
        'delivery_date',
        'delivery_address_id',
        'delivery_driver_id',
        'delivery_vehicle_id',
        'withdraw_date',
        'withdraw_driver_id',
        'withdraw_vehicle_id',
        'final_date',
        'final_address_id',
        'user_id',
        'cart_product_id',
        'days',
        'price',
        'quantity',
        'address_id',
        'address_final_id',
        'distance',
    ];


    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }

    public function getTotal()
    {
        return $this->quantity * $this->price;
    }

    public function cartProduct()
    {
        return $this->belongsTo(CartProduct::class);
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function items()
    {
        return $this->hasMany(OrderLocationProduct::class, 'order_locations_id', 'id', 'productable_id', 'productable_type');
    }
}
