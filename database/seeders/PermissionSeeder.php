<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path('database/data/permissions.csv'), 'r');

        $array = [];

        while (($row = fgetcsv($csvFile)) !== false) {
            $array[] = [
                'id' => intval($row[0]),
                'permission_group_id' => intval($row[1]),
                'key' => $row[2],
                'Description' => $row[3],
            ];
        }

        fclose($csvFile);

        Permission::insert($array);
    }
}
