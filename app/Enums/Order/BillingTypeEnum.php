<?php

namespace App\Enums\Order;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self BOLETO()
 * @method static self CREDIT_CARD()
 * @method static self UNDEFINED()
 * @method static self DEBIT_CARD()
 * @method static self TRANSFER()
 * @method static self DEPOSIT()
 * @method static self PIX()
 */
final class BillingTypeEnum extends Enum
{
}
