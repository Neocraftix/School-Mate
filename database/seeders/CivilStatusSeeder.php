<?php

namespace Database\Seeders;

use App\Models\CivilStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CivilStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = ['Married', 'Single'];

        foreach ($statuses as $status) {
            CivilStatus::firstOrCreate([
                'name' => $status
            ]);
        }
    }
}
