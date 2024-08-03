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
 * @property int $client_id
 * @property int $user_id
 * @property int $provider_id
 * @property int $cart_id
 * @property string $total
 * @property string $discount
 * @property string $gateway_cost
 * @property string $plaform_cost
 * @property string|null $net_total
 * @property string $payment_type
 * @property string|null $payment_status
 * @property string $status
 * @property string|null $payment_date
 * @property string|null $bank_slip_url
 * @property string|null $bank_slip_bar_code
 * @property string|null $bank_slip_expiration_date
 * @property string|null $transaction_id
 * @property string|null $last_transaction_status
 * @property string|null $last_transaction_date
 * @property string|null $last_transaction_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $splits
 * @property-read \App\Models\Cart $cart
 * @method static \Illuminate\Database\Eloquent\Builder|Order filter(array $input = [], $filter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Order paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order simplePaginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Order sort($sort)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBankSlipBarCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBankSlipExpirationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBankSlipUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBeginsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereEndsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereGatewayCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereLastTransactionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereLastTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereLastTransactionStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereLike($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereNetTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePlaformCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSplits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Order withoutTrashed()
 * @mixin \Eloquent
 */
class Order extends Model
{
    use HasFactory, SoftDeletes, Sortable, Filterable;


    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    public function getCart(): Cart
    {
        return $this->cart;
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function isEmpty(): bool
    {
        return !$this->id;
    }  

}
