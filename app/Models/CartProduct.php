<?php

namespace App\Models;

use App\Traits\Sortable;
use EloquentFilter\Filterable;

use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Relations\HasManyThrough,
    Model,
    SoftDeletes
};

/**
 * 
 *
 * @property int $id
 * @property int $cart_id
 * @property string $productable_type
 * @property int $productable_id
 * @property int $address_id
 * @property string $type_local
 * @property int $quantity
 * @property int $days
 * @property string $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Address $address
 * @property-read \App\Models\Cart $cart
 * @property-read Model|\Eloquent $productable
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct filter(array $input = [], $filter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct simplePaginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct sort($sort)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereBeginsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereEndsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereLike($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereProductableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereProductableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereTypeLocal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct withoutTrashed()
 * @mixin \Eloquent
 */
class CartProduct extends Model
{
    use HasFactory, SoftDeletes, Filterable, Sortable;


    protected $fillable = [
        'cart_id',
        'address_id',
        'type_local',
        'quantity',
        'days',
        'price',
        'productable_type',
        'productable_id',
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function productable()
    {
        return $this->morphTo();
    }

    public function residues(): HasManyThrough
    {
        return $this->hasManyThrough(Residue::class, CartProductResidue::class, 'cart_product_id', 'id', 'id', 'residue_id');
    }
}
