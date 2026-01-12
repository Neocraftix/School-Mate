<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MainFurnitureCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Classroom Furniture',
            'Laboratory Furniture',
            'Library Furniture',
            'Office / Administration Furniture',
            'Computer Lab Furniture',
            'Staff Room Furniture',
            'Other / Common Area Furniture',
        ];

        foreach ($categories as $category) {
            DB::table('main_furniture_categories')->updateOrInsert(
                ['category_name' => $category],
                ['updated_at' => now(), 'created_at' => now()]
            );
        }
    }
}
