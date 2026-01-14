<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InventoryCategory;

class InventoryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categories = [
            'Furniture',
            'IT Equipment',
            'Lab Equipment',
            'Sports Items',
            'Stationery',
            'Cleaning Items',
            'Electrical Items',
        ];

        foreach ($categories as $category) {
            InventoryCategory::firstOrCreate(
                ['name' => $category], // check condition
                ['name' => $category]  // create if not exists
            );
        }
    }
}
