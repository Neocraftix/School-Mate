<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $religions = [
            'Buddhism',
            'Hinduism',
            'Christianity',
        ];

        foreach ($religions as $religion) {
            Religion::firstOrCreate([
                'name' => $religion
            ]);
        }
    }
}
