<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Address::insert([
            [
                'id' => 1,
                'user_id' => 3,
                'city_id' => 3.886,
                'name' => 'Padrão',
                'street' => 'Rua Alcides Muniz',
                'number' => 41,
                'complement' => null,
                'district' => 'Conjunto Habitacional Cinqüentenário',
                'zip_code' => '17603-470',
                'latitude' => -21.938306,
                'longitude' => -50.4952171,
                'default' => 1,
                'active' => 1,
                'created_at' => '2024-07-08 16:10:22',
                'updated_at' => '2024-07-08 16:10:34',
                'deleted_at' => null
            ]
        ]);
    }
}
