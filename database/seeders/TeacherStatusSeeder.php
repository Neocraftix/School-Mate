<?php

namespace Database\Seeders;

use App\Models\TeacherStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            'Active',
            'Inactive',
            'On Leave',
        ];

        foreach ($statuses as $status) {
            TeacherStatus::firstOrCreate([
                'name' => $status
            ]);
        }
    }
}
