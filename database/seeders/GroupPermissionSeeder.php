<?php

namespace Database\Seeders;

use App\Models\PermissionGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path('database/data/group_permission.csv'), 'r');

        $array = [];

        while (($row = fgetcsv($csvFile)) !== false) {
            $array[] = [
                'id' => intval($row[0]),
                'name' => $row[1],
                'col' => intval($row[2]),
            ];
        }

        fclose($csvFile);

        PermissionGroup::insert($array);
    }
}
