<?php

namespace Database\Seeders;

use App\Models\SchoolType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SchoolType::firstOrCreate(
            ['school_type_name' => 'Type 1AB'],
            [
                'school_type_status' => config('app.app_data_status_active'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        SchoolType::firstOrCreate(
            ['school_type_name' => 'Type 1C'],
            [
                'school_type_status' => config('app.app_data_status_active'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        SchoolType::firstOrCreate(
            ['school_type_name' => 'Type 2'],
            [
                'school_type_status' => config('app.app_data_status_active'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        SchoolType::firstOrCreate(
            ['school_type_name' => 'Provincial School'],
            [
                'school_type_status' => config('app.app_data_status_active'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        SchoolType::firstOrCreate(
            ['school_type_name' => 'Private School'],
            [
                'school_type_status' => config('app.app_data_status_active'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        SchoolType::firstOrCreate(
            ['school_type_name' => 'Semi-Government School'],
            [
                'school_type_status' => config('app.app_data_status_active'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        SchoolType::firstOrCreate(
            ['school_type_name' => 'International School'],
            [
                'school_type_status' => config('app.app_data_status_active'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        SchoolType::firstOrCreate(
            ['school_type_name' => 'Pirivenas'],
            [
                'school_type_status' => config('app.app_data_status_active'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        SchoolType::firstOrCreate(
            ['school_type_name' => 'Madrasas'],
            [
                'school_type_status' => config('app.app_data_status_active'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
