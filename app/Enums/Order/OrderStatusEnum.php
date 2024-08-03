<?php

namespace App\Enums\Order;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self CREATED()
 * @method static self CONFIRMED()
 * @method static self CANCELED()
 * @method static self REFUNDED()
 */
final class OrderStatusEnum extends Enum
{
}
