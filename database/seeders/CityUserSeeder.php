<?php

namespace Database\Seeders;

use App\Models\CityUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CityUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CityUser::insert([
            [
                'city_id' => 1651,
                'user_id' => 7,
            ],
            [
                'city_id' => 1652,
                'user_id' => 7,
            ],
            [
                'city_id' => 1655,
                'user_id' => 7,
            ],
            [
                'city_id' => 1660,
                'user_id' => 7,
            ],
            [
                'city_id' => 1661,
                'user_id' => 7,
            ],
        ]);
    }
}
