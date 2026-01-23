<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use App\Models\Inventory;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    public function schoolDashBoardIndex()
    {
        $user = User::with('school')->find(Auth::id());

        $studentCount = Student::where('student_status_id', 1)->count();
        $teacherCount = Teacher::where('teacher_status_id', 1)->count();

        $inventoryCount = Inventory::count();
        $furnitureInventoryCount = Furniture::count();

        return view('pages.dashboard', compact('user', 'studentCount', 'teacherCount', 'inventoryCount', 'furnitureInventoryCount'));
    }
}
