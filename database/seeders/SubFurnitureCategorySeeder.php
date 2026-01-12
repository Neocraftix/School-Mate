<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubFurnitureCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mainCategories = DB::table('main_furniture_categories')
            ->pluck('id', 'category_name');

        $data = [

            'Classroom Furniture' => [
                'Student Desk',
                'Student Chair',
                'Teacher Table',
                'Teacher Chair',
                'Whiteboard',
                'Blackboard',
                'Notice Board',
                'Cupboard',
                'Bookshelf',
                'Podium / Lectern',
                'Wall Clock',
                'Bulletin Board',
                'Laptop Table',
                'Projector Stand',
            ],

            'Laboratory Furniture' => [
                'Lab Table / Workbench',
                'Lab Stool',
                'Chemical Storage Cabinet',
                'Equipment Rack',
                'Sink Unit',
                'Fume Hood',
                'Gas Cylinder Stand',
                'Safety Cabinet',
                'Teacher Demo Table',
            ],

            'Library Furniture' => [
                'Bookshelf / Book Rack',
                'Reading Table',
                'Reading Chair',
                'Librarian Table',
                'Computer Table',
                'Magazine Rack',
                'Issue Counter',
                'Study Cubicle',
            ],

            'Office / Administration Furniture' => [
                'Office Table',
                'Office Chair',
                'Principal Table',
                'Principal Chair',
                'Visitor Chair',
                'Meeting Table',
                'Filing Cabinet',
                'Drawer Unit',
                'Cupboard',
                'Reception Desk',
                'Waiting Bench',
            ],

            'Computer Lab Furniture' => [
                'Computer Table',
                'Computer Chair',
                'Server Rack',
                'UPS Stand',
                'Printer Table',
                'Cable Management Rack',
                'Instructor Table',
            ],

            'Staff Room Furniture' => [
                'Sofa Set',
                'Tea Table',
                'Dining Table',
                'Dining Chair',
                'Locker Cabinet',
                'Notice Board',
                'Shoe Rack',
            ],

            'Other / Common Area Furniture' => [
                'Bench',
                'Foldable Chairs',
                'Stage Chairs',
                'Stage Tables',
                'Exam Desk',
                'Exam Chair',
                'Storage Rack',
                'Trolley',
                'Mobile Partition',
            ],
        ];

        foreach ($data as $mainName => $subs) {

            if (!isset($mainCategories[$mainName])) {
                continue;
            }

            foreach ($subs as $sub) {
                DB::table('sub_furniture_categories')->updateOrInsert(
                    [
                        'main_furniture_category_id' => $mainCategories[$mainName],
                        'category_name' => $sub,
                    ],
                    ['updated_at' => now(), 'created_at' => now()]
                );
            }
        }
    }
}
