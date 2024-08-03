<?php

namespace Database\Seeders;

use App\Models\StationaryBucketGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BucketGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        StationaryBucketGroup::insert([
            [
                'stationary_bucket_type_id' => 1,
                'user_id' => 6,
                'color' => 'Azul',
                'material' => 'Aço',
                'weight' => 100,
                'type_lid' => 'A',
                'type_local' => 'B',
                'price_internal' => 300,
                'price_external' => 200,
                'days_internal' => 10,
                'days_external' => 10,
                'pending_deliveries' => 0,
            ],
            [
                'stationary_bucket_type_id' => 4,
                'user_id' => 6,
                'color' => 'Diversas',
                'material' => 'Metal',
                'weight' => 300,
                'type_lid' => 'C',
                'type_local' => 'E',
                'price_internal' => null,
                'price_external' => 400,
                'days_internal' => 0,
                'days_external' => 20,
                'pending_deliveries' => 0,
            ]
        ]);
    }
}
