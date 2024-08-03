<?php

namespace Database\Seeders;

use App\Models\StationaryBucketGallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BucketGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        StationaryBucketGallery::insert([
            [
                'stationary_bucket_group_id' => 1,
                'url' => 'https://i9coletaapi2.adsolucoestecnologia.com.br/storage/files/0YlHLBd6lKd6pdtwXzMWVMtvCQA2heepFH2831J8.jpg',
                'is_main' => 0,
                'created_at' => '2024-07-01 23:07:32',
                'updated_at' => '2024-07-01 23:07:32',
            ],
            [
                'stationary_bucket_group_id' => 1,
                'url' => 'https://i9coletaapi2.adsolucoestecnologia.com.br/storage/files/0YlHLBd6lKd6pdtwXzMWVMtvCQA2heepFH2831J8.jpg',
                'is_main' => 0,
                'created_at' => '2024-07-01 23:07:43',
                'updated_at' => '2024-07-02 16:41:27',
            ],
            [
                'stationary_bucket_group_id' => 1,
                'url' => 'https://i9coletaapi2.adsolucoestecnologia.com.br/storage/files/SGJug3gEKAwch4w9aLfOiu8QVbJtkbOluqwhLWSJ.jpg',
                'is_main' => 0,
                'created_at' => '2024-07-01 23:09:41',
                'updated_at' => '2024-07-01 23:09:41',
            ],
            [
                'stationary_bucket_group_id' => 1,
                'url' => 'https://i9coletaapi2.adsolucoestecnologia.com.br/storage/files/SGJug3gEKAwch4w9aLfOiu8QVbJtkbOluqwhLWSJ.jpg',
                'is_main' => 0,
                'created_at' => '2024-07-01 23:10:35',
                'updated_at' => '2024-07-01 23:10:35',
            ]
        ]);
    }
}
