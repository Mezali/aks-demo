<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path('database/data/cities.csv'), 'r');

        $array = [];

        while (($row = fgetcsv($csvFile)) !== false) {
            $array[] = [
                'state_id' => intval($row[1]),
                'name' => $row[2],
                'ibge_code' => str_pad($row[3], 5, '0', STR_PAD_LEFT),
            ];
        }

        City::insert($array);

        fclose($csvFile);
    }
}
