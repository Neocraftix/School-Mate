<?php

namespace Database\Seeders;

use App\Models\BloodType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bloodTypes = ['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-', 'Other'];

        foreach ($bloodTypes as $type) {
            BloodType::firstOrCreate([
                'blood_type' => $type
            ]);
        }
    }
}
