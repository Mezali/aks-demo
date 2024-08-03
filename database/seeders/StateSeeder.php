<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $csvFile = fopen(base_path('database/data/states.csv'), 'r');

        $array = [];

        while (($row = fgetcsv($csvFile)) !== false) {
            $array[] = [
                'id' => $row[0],
                'name' => $row[1],
                'acronym' => $row[2],
                'ibge_code' => $row[3],
            ];
        }

        fclose($csvFile);

        State::insert($array);
    }
}
