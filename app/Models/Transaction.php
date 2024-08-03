<?php

namespace App\Models;

use App\Traits\Sortable;
use EloquentFilter\Filterable;

use App\Enums\Order\{
    BillingTypeEnum,
    StatusEnum
};
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
 * @property string|null $event_id
 * @property string|null $event_type
 * @property string|null $event_date_created
 * @property string $object
 * @property string $asaas_id
 * @property string $customer
 * @property string|null $payment_link
 * @property string|null $due_date
 * @property string|null $value
 * @property string|null $net_value
 * @property string $billing_type
 * @property int|null $can_be_paid_after_due_date
 * @property string|null $pix_transaction
 * @property string $status
 * @property string|null $description
 * @property string|null $external_reference
 * @property string|null $original_value
 * @property string|null $interest_value
 * @property string|null $original_due_date
 * @property string|null $payment_date
 * @property string|null $client_payment_date
 * @property int|null $installment_number
 * @property string|null $transaction_receipt_url
 * @property string|null $nosso_numero
 * @property string|null $invoice_url
 * @property string|null $bank_slip_url
 * @property string|null $invoice_number
 * @property array|null $discount
 * @property array|null $fine
 * @property array|null $interest
 * @property int|null $deleted
 * @property int|null $postal_service
 * @property int|null $anticipated
 * @property int|null $anticipable
 * @property array|null $refunds
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Order $order
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction filter(array $input = [], $filter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction simplePaginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction sort($sort)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereAnticipable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereAnticipated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereAsaasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereBankSlipUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereBeginsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereBillingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCanBePaidAfterDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereClientPaymentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCustomer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereDeleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereEndsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereEventDateCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereEventType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereExternalReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereFine($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereInstallmentNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereInterest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereInterestValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereInvoiceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereInvoiceUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereLike($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereNetValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereNossoNumero($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereObject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereOriginalDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereOriginalValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction wherePaymentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction wherePaymentLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction wherePixTransaction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction wherePostalService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereRefunds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereTransactionReceiptUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction withoutTrashed()
 * @mixin \Eloquent
 */
class Transaction extends Model
{
    use HasFactory, SoftDeletes, Sortable, Filterable;

    protected $casts = [
        'discount' => 'array',
        'fine' => 'array',
        'interest' => 'array',
        'refunds' => 'array'
    ];

    protected $fillable = [
        'order_id',
        'event_id',
        'event_type',
        'event_date_created',
        'object',
        'asaas_id',
        'customer',
        'payment_link',
        'due_date',
        'value',
        'net_value',
        'billing_type',
        'can_be_paid_after_due_date',
        'pix_transaction',
        'status',
        'description',
        'external_reference',
        'original_value',
        'interest_value',
        'original_due_date',
        'payment_date',
        'client_payment_date',
        'installment_number',
        'transaction_receipt_url',
        'nosso_numero',
        'invoice_url',
        'bank_slip_url',
        'invoice_number',
        'discount',
        'fine',
        'interest',
        'deleted',
        'postal_service',
        'anticipated',
        'anticipable',
        'refunds'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function getOrder():Order
    {
        return $this->order;
    }
}
