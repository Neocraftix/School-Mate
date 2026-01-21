<?php

namespace Database\Seeders;

use App\Models\StudentStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            'Active',
            'Inactive',
            'Suspended',
            'Completed',
            'Dropped Out'
        ];

        foreach ($statuses as $status) {
            StudentStatus::firstOrCreate([
                'student_status' => $status
            ]);
        }
    }
}
