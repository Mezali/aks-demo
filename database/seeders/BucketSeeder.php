<?php

namespace Database\Seeders;

use App\Models\StationaryBucket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BucketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StationaryBucket::insert([
            [
                'stationary_bucket_group_id' => 1,
                'user_id' => 6,
                'code' => 1234567890,
                'status' => 'D',
                'created_at' => '2024-07-01 21:36:59',
                'updated_at' => '2024-07-01 21:36:59',
                'deleted_at' => null,
            ],
            [
                'stationary_bucket_group_id' => 1,
                'user_id' => 6,
                'code' => 12345678900,
                'status' => 'D',
                'created_at' => '2024-07-01 21:37:08',
                'updated_at' => '2024-07-01 22:48:51',
                'deleted_at' => null,
            ],
            [
                'stationary_bucket_group_id' => 1,
                'user_id' => 6,
                'code' => 9012345678,
                'status' => 'D',
                'created_at' => '2024-07-01 21:37:15',
                'updated_at' => '2024-07-01 21:37:15',
                'deleted_at' => null,
            ],
            [
                'stationary_bucket_group_id' => 2,
                'user_id' => 6,
                'code' => 8901234567,
                'status' => 'D',
                'created_at' => '2024-07-01 21:50:06',
                'updated_at' => '2024-07-01 23:06:50',
                'deleted_at' => null,
            ],
            [
                'stationary_bucket_group_id' => 1,
                'user_id' => 6,
                'code' => 'G8D2S3BNHH',
                'status' => 'D',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'stationary_bucket_group_id' => 1,
                'user_id' => 6,
                'code' => 'FTYDDV6OMN',
                'status' => 'D',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'stationary_bucket_group_id' => 1,
                'user_id' => 6,
                'code' => 'HUD6IVWWI3',
                'status' => 'D',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'stationary_bucket_group_id' => 1,
                'user_id' => 6,
                'code' => '713DDV0TZ7',
                'status' => 'D',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'stationary_bucket_group_id' => 1,
                'user_id' => 6,
                'code' => '1KUN9CPMHE',
                'status' => 'D',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'stationary_bucket_group_id' => 1,
                'user_id' => 6,
                'code' => 'UIX4O9CI4F',
                'status' => 'D',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'stationary_bucket_group_id' => 1,
                'user_id' => 6,
                'code' => '1SGI0BKE5C',
                'status' => 'D',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'stationary_bucket_group_id' => 1,
                'user_id' => 6,
                'code' => 'IH970E15AL',
                'status' => 'D',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'stationary_bucket_group_id' => 1,
                'user_id' => 6,
                'code' => '7V676Q3GF0',
                'status' => 'D',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'stationary_bucket_group_id' => 1,
                'user_id' => 6,
                'code' => 'FQUOO48DFH',
                'status' => 'D',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'stationary_bucket_group_id' => 2,
                'user_id' => 6,
                'code' => '49TBPI67JW',
                'status' => 'D',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'stationary_bucket_group_id' => 2,
                'user_id' => 6,
                'code' => 'A38MLRYKCS',
                'status' => 'D',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
        ]);
    }
}
