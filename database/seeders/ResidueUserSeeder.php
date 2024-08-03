<?php

namespace Database\Seeders;

use App\Models\ResidueUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResidueUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        ResidueUser::insert([
            [
                'residue_id' => 3,
                'user_id' => 7,
                'created_at' => '2024-07-02 17:04:56',
                'updated_at' => '2024-07-02 17:04:56',
            ]
        ]);
    }
}
