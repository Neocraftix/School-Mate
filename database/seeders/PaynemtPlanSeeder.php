<?php

namespace Database\Seeders;

use App\Models\PaymentPlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaynemtPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentPlan::firstOrCreate(
            ['plan_name' => config('app.free_plan_name')], // unique check
            [
                'time_duration' => config('app.free_plan_time_duration'),
                'plan_status' => config('app.app_data_status_active'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
