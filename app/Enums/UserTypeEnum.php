<?php

namespace App\Enums;

enum UserTypeEnum: string
{
    case DEV = 'dev';
    case ADMIN = 'admin';
    case LESSOR = 'lessor';
    case LESSEE = 'lessee';
    case DRIVER = 'driver';

    public function label(): string
    {
        return match ($this) {
            static::SUPERADMIN => 'Super Administrador',
            static::ADMIN => 'Administrador',
            static::LESSOR => 'Locador',
            static::LESSEE => 'Locatário',
            static::DRIVER => 'Motorista',
        };
    }
}
