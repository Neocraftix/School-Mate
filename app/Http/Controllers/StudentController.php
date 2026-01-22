<?php

namespace App\Http\Controllers;

use App\Models\Assistance;
use App\Models\BloodType;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Skill;
use App\Models\Student;
use App\Models\StudentStatus;
use App\Models\Transport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with(['grade', 'studentStatus'])->paginate(50);
        $genders = Gender::all();
        $transports = Transport::all();
        $bloodTypes = BloodType::all();
        $skills = Skill::all();
        $assistances = Assistance::all();
        $grades = Grade::all();

        return view('pages.student.student-index', compact(
            'students',
            'genders',
            'transports',
            'bloodTypes',
            'skills',
            'assistances',
            'grades'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'admission_number' => 'required|string',
            'child_name' => 'required|string|max:255',
            'full_name_with_initials' => 'required|string|max:255',
            'gender_id' => 'required|exists:genders,id',
            'date_of_birth' => 'required|date',
            'transport_id' => 'required|exists:transports,id',
            'sibling_details' => 'nullable|string',
            'address' => 'required|string',
            'mother_name' => 'nullable|string|max:255',
            'father_name' => 'nullable|string|max:255',
            'guardian_name' => 'nullable|string|max:255',
            'guardian_address' => 'nullable|string',
            'telephone_number' => 'required|string|max:15',
            'blood_type_id' => 'required|exists:blood_types,id',
            'special_medical_conditions' => 'nullable|string',
            'skill_id' => 'required|exists:skills,id',
            'assistance_id' => 'required|exists:assistances,id',
            'grade_id' => 'required|exists:grades,id',
        ]);

        $user = User::with('school')->find(Auth::id());

        $array = ['student_status_id' => '1', 'school_id' => $user->school->id];

        Student::create(array_merge($validated, $array));

        return redirect()->back()->with('success', 'Student added successfully');
    }

    public function studentDetails($studentId)
    {
        $student = Student::with(['grade', 'studentStatus', 'grade', 'assistance', 'bloodType', 'transport'])->findOrFail($studentId);
        return view('pages.student.student-details', compact('student'));
    }

    public function studentGanarateReportIndex()
    {
        $user = User::with('school')->find(Auth::id());

        $students = Student::with([
            'gender',
            'transport',
            'bloodType',
            'skill',
            'assistance',
            'grade',
            'studentStatus',
        ])->where('school_id', $user->school->id)->get();

        $genders = Gender::all();
        $transports = Transport::all();
        $bloodTypes = BloodType::all();
        $skills = Skill::all();
        $assistances = Assistance::all();
        $grades = Grade::all();
        $studentStatues = StudentStatus::all();

        return view('pages.student.student-report', compact(
            'students',
            'genders',
            'transports',
            'bloodTypes',
            'skills',
            'assistances',
            'grades',
            'studentStatues'
        ));
    }

    public function studentGanarateReportFilter(Request $request)
    {
        $genders = Gender::all();
        $transports = Transport::all();
        $bloodTypes = BloodType::all();
        $skills = Skill::all();
        $assistances = Assistance::all();
        $grades = Grade::all();
        $studentStatues = StudentStatus::all();

        $user = User::with('school')->find(Auth::id());

        $students = Student::with([
            'gender',
            'transport',
            'bloodType',
            'skill',
            'assistance',
            'grade',
            'studentStatus',
        ])

            // Admission Number
            ->when($request->admissionNumber, function ($q) use ($request) {
                $q->where('admission_number', 'like', '%' . $request->admissionNumber . '%');
            })

            // Child Name
            ->when($request->childName, function ($q) use ($request) {
                $q->where('child_name', 'like', '%' . $request->childName . '%');
            })

            // Gender (ID)
            ->when($request->gender, function ($q) use ($request) {
                $q->where('gender_id', $request->gender);
            })

            // Transport (ID)
            ->when($request->transport, function ($q) use ($request) {
                $q->where('transport_id', $request->transport);
            })

            // Blood Type (ID)
            ->when($request->bloodType, function ($q) use ($request) {
                $q->where('blood_type_id', $request->bloodType);
            })

            // Special Skill (ID)
            ->when($request->specialSkills, function ($q) use ($request) {
                $q->where('skill_id', $request->specialSkills);
            })

            // Government Assistance (ID)
            ->when($request->govAssistance, function ($q) use ($request) {
                $q->where('assistance_id', $request->govAssistance);
            })

            // Grade (ID)
            ->when($request->grade, function ($q) use ($request) {
                $q->where('grade_id', $request->grade);
            })

            // Student Status (ID)
            ->when($request->studentStatus, function ($q) use ($request) {
                $q->where('student_status_id', $request->studentStatus);
            })->where('school_id', $user->school->id)->get();

        return view('pages.student.student-report', compact(
            'students',
            'genders',
            'transports',
            'bloodTypes',
            'skills',
            'assistances',
            'grades',
            'studentStatues'
        ));
    }

    public function studentUpdateIndex($studentId)
    {
        $genders = Gender::all();
        $transports = Transport::all();
        $bloodTypes = BloodType::all();
        $skills = Skill::all();
        $assistances = Assistance::all();
        $grades = Grade::all();
        $studentStatues = StudentStatus::all();

        $student = Student::with([
            'gender',
            'transport',
            'bloodType',
            'skill',
            'assistance',
            'grade',
            'studentStatus',
        ])->findOrFail($studentId);

        return view('pages.student.student-update', compact(
            'student',
            'genders',
            'transports',
            'bloodTypes',
            'skills',
            'assistances',
            'grades',
            'studentStatues'
        ));
    }

    public function studentUpdate(Request $request, $studentId)
    {

        $validated = $request->validate([
            'child_name' => 'required|string|max:255',
            'student_status_id' => 'required|exists:student_statuses,id',
            'full_name_with_initials' => 'required|string|max:255',
            'gender_id' => 'required|exists:genders,id',
            'date_of_birth' => 'required|date',
            'transport_id' => 'required|exists:transports,id',
            'sibling_details' => 'nullable|string',
            'address' => 'required|string',
            'mother_name' => 'nullable|string|max:255',
            'father_name' => 'nullable|string|max:255',
            'guardian_name' => 'nullable|string|max:255',
            'guardian_address' => 'nullable|string',
            'telephone_number' => 'required|string|max:15',
            'blood_type_id' => 'required|exists:blood_types,id',
            'special_medical_conditions' => 'nullable|string',
            'skill_id' => 'required|exists:skills,id',
            'assistance_id' => 'required|exists:assistances,id',
            'grade_id' => 'required|exists:grades,id',
        ]);

        $student = Student::findOrFail($studentId);

        if ($student->fill($validated)->isDirty() === false) {
            return redirect()
                ->back()
                ->with('info', 'No changes detected. Student data not updated.');
        }

        $student->save();

        return redirect()->back()->with('success', 'Student updated successfully!');
    }

    public function studentDelete($studentId)
    {
        $student = Student::findOrFail($studentId);
        $student->update(
            ['student_status_id' => 5]
        );

        return back()->with('success', "Student '{$student->child_name}' deleted successfully.");
    }
}
