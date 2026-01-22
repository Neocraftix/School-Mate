<?php

namespace Database\Seeders;

use App\Models\Ethnicity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EthnicitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ethnicityes = [
            'Sinhalese',
            'Tamils',
            'Burghers',
            'Malays',
        ];

        foreach ($ethnicityes as $ethnicity) {
            Ethnicity::firstOrCreate([
                'name' => $ethnicity
            ]);
        }
    }
}
