<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self AGUARDANDO_CONFIRMACAO()
 * @method static self PEDIDO_ACEITO()
 * @method static self PEDIDO_RECUSADO()
 * @method static self PEDIDO_CANCELADO()
 * @method static self PAGAMENTO_PENDENTE()
 */
final class OrderLocationStatusEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'AGUARDANDO_CONFIRMACAO' => 'AR',
            'PEDIDO_ACEITO' => 'PA',
            'PEDIDO_RECUSADO' => 'PR',
            'PEDIDO_CANCELADO' => 'PC',
            'PAGAMENTO_PENDENTE' => 'PP',
        ];
    }
}
