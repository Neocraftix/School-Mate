<?php

namespace Database\Seeders;

use App\Models\MainFurnitureCategory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(StatusSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PaynemtPlanSeeder::class);
        $this->call(SchoolTypeSeeder::class);
        $this->call(ProvincenSeeder::class);
        $this->call(EducationZoneSeeder::class);
        $this->call(EducationDivisionSeeder::class);
        $this->call(InventoryCategorySeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(TransportSeeder::class);
        $this->call(BloodTypeSeeder::class);
        $this->call(SkillSeeder::class);
        $this->call(AssistanceSeeder::class);
        $this->call(GradeSeeder::class);
        $this->call(StudentStatusSeeder::class);
        $this->call(TitleSeeder::class);
        $this->call(EthnicitySeeder::class);
        $this->call(ReligionSeeder::class);
        $this->call(CivilStatusSeeder::class);
        $this->call(TeacherStatusSeeder::class);
        $this->call(MainFurnitureCategorySeeder::class);
        $this->call(SubFurnitureCategorySeeder::class);
        $this->call(InventorySupplierSeeder::class);
    }
}
