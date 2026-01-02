<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::firstOrCreate(
            ['status_name' => 'Active'],
            ['created_at' => now(), 'updated_at' => now()]
        );

        Status::firstOrCreate(
            ['status_name' => 'Inactive'],
            ['created_at' => now(), 'updated_at' => now()]
        );
    }
}
