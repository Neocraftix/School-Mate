<?php

namespace App\Http\Controllers;

use App\Models\PaymentPlan;
use App\Models\Province;
use App\Models\Role;
use App\Models\School;
use App\Models\SchoolType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function index()
    {
        $scholTypes = SchoolType::where('school_type_status', config('app.app_data_status_active'))->get();
        $provinces = Province::all();
        return view('pages.registar', compact('scholTypes', 'provinces'));
    }

    public function schoolRegistar(Request $request)
    {
        $request->validate(
            [
                'schoolName'               => 'required|min:3',
                'schoolType'               => 'required',
                'schoolCensusNumber'       => 'required|numeric',
                'schoolId'                 => 'required|numeric',
                'schoolEducatinDivision'   => 'required',
                'schoolEmailAddress' => 'required|email|unique:users,email',
                'schoolTelephoneNumber' => [
                    'required',
                    'regex:/^(?:\+94|0)7[0-9]{8}$/'
                ],
                'schoolPostalAddress'      => 'required',
                'schoolPassword'           => 'required|min:8',
            ],
            [
                'schoolName.required'             => 'School name is required.',
                'schoolName.min'                  => 'School name must be at least 3 characters.',

                'schoolType.required'             => 'Please select a school type.',

                'schoolCensusNumber.required'     => 'Census number is required.',
                'schoolCensusNumber.numeric'      => 'Census number must be a numeric value.',

                'schoolId.required'               => 'School ID is required.',
                'schoolId.numeric'                => 'School ID must be a numeric value.',

                'schoolEducatinDivision.required' => 'Please select an education division.',

                'schoolEmailAddress.required'     => 'Email address is required.',
                'schoolEmailAddress.email'        => 'Please enter a valid email address.',
                'schoolEmailAddress.unique' => 'This email is already registered with another school.',

                'schoolTelephoneNumber.required' =>
                'Telephone number is required.',
                'schoolTelephoneNumber.regex' =>
                'Please enter a valid mobile number (e.g., 0712345678 or +94712345678).',

                'schoolPostalAddress.required'    => 'Postal address is required.',

                'schoolPassword.required'         => 'Password is required.',
                'schoolPassword.min'              => 'Password must be at least 8 characters long.',
            ]
        );

        $schoolTMPCode = uniqid();

        $paymentPlanID = PaymentPlan::where('plan_name', config('app.free_plan_name'))->value('id');

        School::create([
            'school_name' => $request->schoolName,
            'census_number' => $request->schoolCensusNumber,
            'school_id' => $request->schoolId,
            'phone_number' => $request->schoolTelephoneNumber,
            'school_postal_address' => $request->schoolPostalAddress,
            'tmp_code' => $schoolTMPCode,
            'payment_start' => today(),
            'payment_expire' => today()->addDays((int) config('app.free_plan_time_duration')),
            'division_id' => $request->schoolEducatinDivision,
            'school_type' => $request->schoolType,
            'school_status' => config('app.app_data_status_active'),
            'payment_id' => $paymentPlanID,
        ]);

        $scholID = School::where('tmp_code', $schoolTMPCode)->value('id');

        $supperAdminID = Role::where('role_name', 'Supper Admin')->value('id');

        User::create([
            'name' => $request->schoolName,
            'email' => $request->schoolEmailAddress,
            'school_id' => $scholID,
            'password' => Hash::make($request->schoolPassword),
            'users_status' => config('app.app_data_status_active'),
            'role_id' => $supperAdminID,
        ]);

        return back()->with('success', 'Registered successfully');
    }
}
