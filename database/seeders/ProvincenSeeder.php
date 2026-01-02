<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvincenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Province::firstOrCreate(
            ['province_name' => 'Northern Province'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        Province::firstOrCreate(
            ['province_name' => 'Eastern Province'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        Province::firstOrCreate(
            ['province_name' => 'Southern Province'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        Province::firstOrCreate(
            ['province_name' => 'Western Province'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        Province::firstOrCreate(
            ['province_name' => 'Central Province'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        Province::firstOrCreate(
            ['province_name' => 'Uva Province'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        Province::firstOrCreate(
            ['province_name' => 'Sabaragamuva Province'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        Province::firstOrCreate(
            ['province_name' => 'North Central Province'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        Province::firstOrCreate(
            ['province_name' => 'North Western Province'],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
