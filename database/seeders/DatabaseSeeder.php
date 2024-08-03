<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            StateSeeder::class,
            CitySeeder::class,
            UserSeeder::class,
            CityUserSeeder::class,
            GroupPermissionSeeder::class,
            PermissionSeeder::class,
            PermissionProfileSeeder::class,
            StationaryBucketTypeSeeder::class,
            VehicleTypeSeeder::class,
            VehicleSeeder::class,
            BucketGroupSeeder::class,
            BucketGallerySeeder::class,
            BucketSeeder::class,
            ResidueSeeder::class,
            ResidueUserSeeder::class,
            AddressSeeder::class,
        ]);
    }
}
