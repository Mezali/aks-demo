<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Vehicle::insert([
            [
                'user_id' => 7,
                'vehicle_type_id' => 1,
                'renavam' => 61707151467,
                'year_manufacture' => 2.006,
                'year_model' => 2.006,
                'brand' => 'Maserati',
                'model' => 'GranSport Spyder 4.2 32V',
                'version' => 8,
                'fuel' => 'Gasolina',
                'motor' => '400cv',
                'total_gross_weight' => 0,
                'plate' => 'KGI-0980',
                'capacity' => 0,
                'axles' => 0,
                'status' => 'D',
            ],
            [
                'user_id' => 7,
                'vehicle_type_id' => 1,
                'renavam' => 'asd',
                'year_manufacture' => 2.025,
                'year_model' => 2.026,
                'brand' => 'asd',
                'model' => 'asd',
                'version' => 'sda',
                'fuel' => 'asd',
                'motor' => 'asd',
                'total_gross_weight' => null,
                'plate' => 'adas',
                'capacity' => null,
                'axles' => null,
                'status' => 'D',
            ]
        ]);
    }
}
