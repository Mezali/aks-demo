<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profile = Profile::where('user_id', '1')->with('permissions')->first();
        $permissions = Permission::whereNotIn('id', [80, 81, 82, 135]);
        $profile->permissions()->attach($permissions->pluck('id'));
        $profile->save();
    }
}
