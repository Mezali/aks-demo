<?php

namespace App\Enums\Order;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self PENDING()
 * @method static self RECEIVED()
 * @method static self CONFIRMED()
 * @method static self OVERDUE()
 * @method static self REFUNDED()
 * @method static self RECEIVED_IN_CASH()
 * @method static self REFUND_REQUESTED()
 * @method static self REFUND_IN_PROGRESS()
 * @method static self CHARGEBACK_REQUESTED()
 * @method static self CHARGEBACK_DISPUTE()
 * @method static self AWAITING_CHARGEBACK_REVERSAL()
 * @method static self DUNNING_REQUESTED()
 * @method static self DUNNING_RECEIVED()
 * @method static self AWAITING_RISK_ANALYSIS()
 */
final class PaymentStatusEnum extends Enum
{
}
