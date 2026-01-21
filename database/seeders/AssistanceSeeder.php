<?php

namespace Database\Seeders;

use App\Models\Assistance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssistanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['Receiving', 'Not Receiving'];

        foreach ($data as $item) {
            Assistance::firstOrCreate([
                'assistance' => $item
            ]);
        }
    }
}
