<?php

namespace Database\Seeders;

use App\Models\StationaryBucketType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StationaryBucketTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $array = [
            [
                'name' => 'C3',
                'm3' => 1200,
                'letter_a' => 100,
                'letter_b' => 200,
                'letter_c' => 300,
                'letter_d' => 400,
                'letter_e' => 500,
                'letter_f' => 600,
                'photo' => "https://i9coletaapi2.adsolucoestecnologia.com.br/storage/files/MBa4xdGVng4ujTZBkdLrkR0Q5GZOcAul1ORtEocy.png",
            ],
            [
                'name' => 'C4',
                'm3' => 1200,
                'letter_a' => 100,
                'letter_b' => 200,
                'letter_c' => 300,
                'letter_d' => 400,
                'letter_e' => 500,
                'letter_f' => 600,
                'photo' => "https://i9coletaapi2.adsolucoestecnologia.com.br/storage/files/LcdgI3MepnmNKM1c9eSnBoP87BzGHhgJ5XCTIYpX.jpg",
            ],
            [
                'name' => 'C5',
                'm3' => 1200,
                'letter_a' => 100,
                'letter_b' => 200,
                'letter_c' => 300,
                'letter_d' => 400,
                'letter_e' => 500,
                'letter_f' => 600,
                'photo' => "https://i9coletaapi2.adsolucoestecnologia.com.br/storage/files/rJmU7KFYbNvVYUzkIvE8sWpdm3Ch3hJ8puERcKkW.jpg",
            ],
            [
                'name' => 'C7',
                'm3' => 1200,
                'letter_a' => 100,
                'letter_b' => 200,
                'letter_c' => 300,
                'letter_d' => 400,
                'letter_e' => 500,
                'letter_f' => 600,
                'photo' => "https://i9coletaapi2.adsolucoestecnologia.com.br/storage/files/kXjGkNoE4I6xG9EChb3m2WhETh7SCI5ftgcXBPRp.jpg",
            ],
            [
                'name' => 'C10',
                'm3' => 1200,
                'letter_a' => 100,
                'letter_b' => 200,
                'letter_c' => 300,
                'letter_d' => 400,
                'letter_e' => 500,
                'letter_f' => 600,
                'photo' => "https://i9coletaapi2.adsolucoestecnologia.com.br/storage/files/0vA1Ck5ImQD60v1tSOahSNVwkMSGKAWLOMGdr9C7.jpg",
            ]
        ];

        StationaryBucketType::insert($array);
    }
}
