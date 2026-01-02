<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::firstOrCreate(
            ['role_name' => 'Supper Admin'],
            ['role_status' => config('app.app_data_status_active')],
            ['created_at' => now(), 'updated_at' => now()]
        );

        Role::firstOrCreate(
            ['role_name' => 'Admin'],
            ['role_status' => config('app.app_data_status_active')],
            ['created_at' => now(), 'updated_at' => now()]
        );

        Role::firstOrCreate(
            ['role_name' => 'Data Entry'],
            ['role_status' => config('app.app_data_status_active')],
            ['created_at' => now(), 'updated_at' => now()]
        );

        Role::firstOrCreate(
            ['role_name' => 'Teacher'],
            ['role_status' => config('app.app_data_status_active')],
            ['created_at' => now(), 'updated_at' => now()]
        );

        Role::firstOrCreate(
            ['role_name' => 'Student'],
            ['role_status' => config('app.app_data_status_active')],
            ['created_at' => now(), 'updated_at' => now()]
        );
    }
}
