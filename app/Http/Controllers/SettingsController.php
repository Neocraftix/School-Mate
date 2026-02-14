<?php

namespace App\Http\Controllers;

use App\Helpers\CommonHelper;
use App\Models\Role;
use App\Models\SchoolType;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function adminManagementIndex()
    {
        $roles = Role::all();

        $user = User::with('school')->find(Auth::id());

        $admins = User::with('role')->where('school_id', $user->school->id)->get();
        return view('pages.Settings.admin-management', compact('roles', 'admins'));
    }

    public function schoolInformationIndex()
    {
        $user = User::with('school')->find(Auth::id());
        $schoolTypes = SchoolType::all();

        return view('pages.school.school-informaction', compact('user', 'schoolTypes'));
    }
    public function schoolInformationUpdate(Request $request)
    {
        $user = User::with('school')->find(Auth::id());
        $school = $user->school;

        $validatedData = $request->validate([
            'school_name' => 'required|string|max:255',
            'census_number' => 'required|string|max:255',
            'school_id' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'school_postal_address' => 'required|string|max:255',
            'school_type' => 'required|exists:school_type,id',
        ]);

        $school->update($validatedData);

        return redirect()->route('settings.schoolInformationIndex')->with('success', 'School information updated successfully.');
    }

    public function schoolInformationPdf()
    {
        $user = User::with('school')->find(Auth::id());
        $school = $user->school;

        $reportId = CommonHelper::generateAttendanceReport('School Information Report');

        $pdf = PDF::loadView('pdf-templates.school.school-information', compact('school', 'reportId'));

        $safe_filename = preg_replace('/[^A-Za-z0-9_\-]/', '_', $school->school_name);

        return $pdf->download('School_Information_' . $safe_filename . '_(' . date('d M Y H:i:s') . ').pdf');
    }
}
