<?php

namespace Database\Seeders;

use App\Models\InventorySupplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $suppliers = [
            'Own Purchased',
            'Central Government',
            'Provincial',
            'OBA/OGA',
            'Gift',
        ];

        foreach ($suppliers as $supplierName) {

            InventorySupplier::updateOrCreate(
                ['supplier_name' => $supplierName], // check condition
                ['supplier_name' => $supplierName]  // insert data
            );
        }
    }
}
