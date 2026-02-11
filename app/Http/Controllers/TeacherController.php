<?php

namespace App\Http\Controllers;

use App\Models\CivilStatus;
use App\Models\EducationZone;
use App\Models\Ethnicity;
use App\Models\Gender;
use App\Models\Religion;
use App\Models\Teacher;
use App\Models\TeacherStatus;
use App\Models\Title;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index()
    {
        $titles = Title::all();
        $ethnicityes = Ethnicity::all();
        $genders = Gender::all();
        $religions = Religion::all();
        $districts =  EducationZone::all();
        $civilStatuses = CivilStatus::all();

        $teachers = Teacher::with('teacherStatus')->paginate(25);

        return view('pages.teacher.teacher-index', compact('teachers', 'titles', 'ethnicityes', 'genders', 'religions', 'districts', 'civilStatuses'));
    }

    public function store(Request $request)
    {
        $validated =  $request->validate([
            'title_id'          => 'required|exists:titles,id',
            'ethnicity_id'      => 'required|exists:ethnicities,id',
            'gender_id'         => 'required|exists:genders,id',
            'religion_id'       => 'required|exists:religions,id',
            'district_id'       => 'required|exists:education_zone,id',
            'civil_status_id'   => 'required|exists:civil_statuses,id',

            'full_name'             => 'required|string|min:3|max:255',
            'name_with_initials'    => 'required|string|min:3|max:255',
            'nic' => 'required|string|min:10|max:15',
            'dob' => 'required|date|before:today',
            'email' => 'required|email|max:255',
            'phone' => ['required', 'regex:/^(?:0|94|\+94)?7\d{8}$/'],
            'address_permanent' => 'required|string|min:5|max:500',

            'address_temporary' => 'nullable|string|min:5|max:500',

            'ds_division' => 'required|string|max:100',
            'gs_division' => 'required|string|max:100',

            'spouse_name' => 'nullable|string|max:255',
            'children_names' => 'nullable|string|max:500',
            'children_dobs'  => 'nullable|string|max:500',

            'ncoe'    => 'nullable|string|max:255',
            'degree'  => 'nullable|string|max:255',
            'al'      => 'nullable|string|max:255',
            'diploma' => 'nullable|string|max:255',
            'other'   => 'nullable|string|max:255',
        ]);

        $user = User::with('school')->find(Auth::id());

        $array = ['teacher_status_id' => '1', 'school_id' => $user->school->id];

        Teacher::create(array_merge($validated, $array));

        return redirect()->back()->with('success', 'Teacher added successfully');
    }

    public function teacherDetails($teacherID)
    {
        $teacher = Teacher::with(['title', 'ethnicity', 'gender', 'religion', 'district', 'civilStatus', 'teacherStatus'])->findOrFail($teacherID);
        return view('pages.teacher.teacher-details', compact('teacher'));
    }

    public function teacherUpdateIndex($teacherID)
    {
        $titles = Title::all();
        $ethnicityes = Ethnicity::all();
        $genders = Gender::all();
        $religions = Religion::all();
        $districts =  EducationZone::all();
        $civilStatuses = CivilStatus::all();
        $teacherStatuses = TeacherStatus::all();

        $teacher = Teacher::findOrFail($teacherID);

        return view('pages.teacher.teacher-update', compact('teacher', 'titles', 'ethnicityes', 'genders', 'religions', 'districts', 'civilStatuses', 'teacherStatuses'));
    }

    public function updateTeacher(Request $request, $teacherId)
    {
        $validated =  $request->validate([
            'title_id'          => 'required|exists:titles,id',
            'ethnicity_id'      => 'required|exists:ethnicities,id',
            'gender_id'         => 'required|exists:genders,id',
            'religion_id'       => 'required|exists:religions,id',
            'district_id'       => 'required|exists:education_zone,id',
            'civil_status_id'   => 'required|exists:civil_statuses,id',
            'teacher_status_id' => 'required|exists:teacher_statuses,id',

            'full_name'             => 'required|string|min:3|max:255',
            'name_with_initials'    => 'required|string|min:3|max:255',
            'nic' => 'required|string|min:10|max:15',
            'dob' => 'required|date|before:today',
            'email' => 'required|email|max:255',
            'phone' => ['required', 'regex:/^(?:0|94|\+94)?7\d{8}$/'],
            'address_permanent' => 'required|string|min:5|max:500',

            'address_temporary' => 'nullable|string|min:5|max:500',

            'ds_division' => 'required|string|max:100',
            'gs_division' => 'required|string|max:100',

            'spouse_name' => 'nullable|string|max:255',
            'children_names' => 'nullable|string|max:500',
            'children_dobs'  => 'nullable|string|max:500',

            'ncoe'    => 'nullable|string|max:255',
            'degree'  => 'nullable|string|max:255',
            'al'      => 'nullable|string|max:255',
            'diploma' => 'nullable|string|max:255',
            'other'   => 'nullable|string|max:255',
        ]);

        $teacher = Teacher::findOrFail($teacherId);

        if ($teacher->fill($validated)->isDirty() === false) {
            return redirect()
                ->back()
                ->with('info', 'No changes detected. teacher data not updated.');
        }

        $teacher->save();

        return redirect()->back()->with('success', 'teacher updated successfully!');
    }

    public function teacherDelete($teacherID)
    {
        $teacher = Teacher::findOrFail($teacherID);

        $teacher->update(
            ['teacher_status_id' => 2]
        );

        return back()->with('success', "Teacher '{$teacher->full_name}' deleted successfully.");
    }

    public function teacherGenarateReportIndex()
    {
        $ethnicityes = Ethnicity::all();
        $genders = Gender::all();
        $religions = Religion::all();
        $districts =  EducationZone::all();
        $civilStatuses = CivilStatus::all();

        $teachers = Teacher::with('teacherStatus')->get();

        return view('pages.teacher.teacher-report', compact('teachers', 'ethnicityes', 'genders', 'religions', 'districts', 'civilStatuses'));
    }

    public function teacherGanarateReportFilter(Request $request)
    {
        $ethnicityes = Ethnicity::all();
        $genders = Gender::all();
        $religions = Religion::all();
        $districts =  EducationZone::all();
        $civilStatuses = CivilStatus::all();

        $teachers = Teacher::with([
            'ethnicity',
            'gender',
            'religion',
            'district',
            'civilStatus',
        ])

            ->when($request->filled('nic'), function ($q) use ($request) {
                $q->where('nic_hash', hash('sha256', $request->nic));
            })

            ->when($request->full_name, function ($q) use ($request) {
                $q->where('full_name', 'like', '%' . $request->full_name . '%');
            })

            ->when($request->ethnicity, function ($q) use ($request) {
                $q->where('ethnicity_id', $request->ethnicity);
            })

            ->when($request->gender, function ($q) use ($request) {
                $q->where('gender_id', $request->gender);
            })

            ->when($request->religion, function ($q) use ($request) {
                $q->where('religion_id', $request->religion);
            })

            ->when($request->district, function ($q) use ($request) {
                $q->where('district_id', $request->spedistrictcialSkills);
            })->get();

        return view('pages.teacher.teacher-report', compact('teachers', 'ethnicityes', 'genders', 'religions', 'districts', 'civilStatuses'));
    }

    function teacherRetirement(Request $request)
    {
        $ethnicityes = Ethnicity::all();
        $genders = Gender::all();
        $religions = Religion::all();
        $districts =  EducationZone::all();
        $civilStatuses = CivilStatus::all();

        $request->validate([
            'retire_date' => 'required|date',
        ]);

        $givenDate = Carbon::parse($request->retire_date);

        $maxDob = $givenDate->copy()->subYears(60);


        $teachers = Teacher::with([
            'ethnicity',
            'gender',
            'religion',
            'district',
            'civilStatus',
        ])
            ->whereDate('dob', '<=', $maxDob)
            ->get();

        return view('pages.teacher.teacher-report', compact('teachers', 'ethnicityes', 'genders', 'religions', 'districts', 'civilStatuses'));
    }
}
