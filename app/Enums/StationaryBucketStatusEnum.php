<?php

namespace App\Enums;

enum StationaryBucketStatusEnum: string
{
    case AVAILABLE = 'D';
    case PENDING_DELIVERY = 'EP';
    case LEASED = 'L';
    case AWAITING_WITHDRAWAL = 'AR';
    case DRIVER_ON_THE_WAY = 'MC';
    case IN_TRANSIT_FOR_RENTAL = 'ETL';
    case IN_TRANSIT_FOR_DISPOSAL = 'ETR';

    function label(): string
    {
        return match ($this) {
            self::AVAILABLE => 'Disponível',
            self::PENDING_DELIVERY => 'Entrega Pendente',
            self::LEASED => 'Locada',
            self::AWAITING_WITHDRAWAL => 'Aguardando Retirada',
            self::DRIVER_ON_THE_WAY => 'Motorista a Caminho',
            self::IN_TRANSIT_FOR_RENTAL => 'Em Trânsito para Locação',
            self::IN_TRANSIT_FOR_DISPOSAL => 'Em Trânsito para Descarte',
        };
    }
}
