<?php

namespace Database\Seeders;

use App\Enums\PlatformConfigsEnum;
use App\Models\PlatformConfig;
use Illuminate\Database\Seeder;

class PlatformConfigsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PlatformConfig::create([
            'name' => PlatformConfigsEnum::BANK_SLIP_TAX,
            'value' => 1.99,
            'type' => 'float',
        ]);

        PlatformConfig::create([
            'name' => PlatformConfigsEnum::CREDIT_CARD_FIXED_TAX,
            'value' => 0.49,
            'type' => 'float',
        ]);

        PlatformConfig::create([
            'name' => PlatformConfigsEnum::CREDIT_CARD_PERCENTAGE_TAX,
            'value' => 2.99,
            'type' => 'float',
        ]);

        PlatformConfig::create([
            'name' => PlatformConfigsEnum::DEBIT_CARD_FIXED_TAX,
            'value' => 0.35,
            'type' => 'float',
        ]);

        PlatformConfig::create([
            'name' => PlatformConfigsEnum::DEBIT_CARD_PERCENTAGE_TAX,
            'value' => 1.85,
            'type' => 'float',
        ]);

        PlatformConfig::create([
            'name' => PlatformConfigsEnum::PIX_TAX,
            'value' => 1.99,
            'type' => 'float',
        ]);

        PlatformConfig::create([
            'name' => PlatformConfigsEnum::PLATFORM_TAX,
            'value' => 5.99,
            'type' => 'float',
        ]);
    }
}
