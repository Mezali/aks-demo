<?php

namespace App\Models;

use App\Traits\Sortable;
use EloquentFilter\Filterable;

use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Relations\HasMany,
    Model,
    SoftDeletes
};

/**
 * 
 *
 * @property int $id
 * @property int $client_id
 * @property int $user_id
 * @property int $profile_id
 * @property int $is_open
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User $client
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CartProduct> $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|Cart filter(array $input = [], $filter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart simplePaginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart sort($sort)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereBeginsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereEndsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereIsOpen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereLike($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereProfileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart withoutTrashed()
 * @mixin \Eloquent
 */
class Cart extends Model
{
    use HasFactory, SoftDeletes, Sortable, Filterable;

    protected $fillable = [
        'user_id',
        'is_open',
    ];

    public function createOrderLocation()
    {
        //função de criar orders locations
    }

    public function products(): HasMany
    {
        return $this->hasMany(CartProduct::class);
    }

    public function hasProducts(): bool
    {
        if ($this->products->count() > 0) {
            return true;
        }
        return false;
    }

    public function isEmpty(): bool
    {
        return !$this->hasProducts();
    }    

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function getTotal()
    {

        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->quantity * $product->price;
        }
        return $total;
    }

    public function getClient(): User
    {
        return $this->client;
    }

    public function isOpen()
    {
        return $this->is_open;
    }

    public function isClosed()
    {
        return !$this->isOpen();
    }
}
