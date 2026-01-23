<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function schoolLoginIndex()
    {
        return view('pages.login');
    }

    function schoolLoginPost(Request $request)
    {

        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            return redirect()->route('school.dashboard');
        }

        return back()->withErrors(['login' => 'Invalid credentials'])->withInput();
    }

    function logout()
    {
        Auth::logout();
        return redirect('/school-login');
    }

    public function createAdmin(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email:rfc,dns|unique:users,email',
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'regex:/[a-z]/',      // lowercase letter
                    'regex:/[A-Z]/',      // uppercase letter
                    'regex:/[0-9]/',      // number
                    'regex:/[@$!%*#?&()]/', // special character
                ],
                'role_id' => 'required|exists:role,id',
            ],
            [
                // name
                'name.required' => 'The name field is required.',
                'name.max' => 'The name may not be greater than 255 characters.',

                // email
                'email.required' => 'The email field is required.',
                'email.email' => 'Please provide a valid email address.',
                'email.unique' => 'This email is already registered.',

                // password
                'password.required' => 'The password field is required.',
                'password.min' => 'The password must be at least 8 characters.',
                'password.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.',

                // role
                'role_id.required' => 'Please select a user role.',
                'role_id.exists' => 'The selected role is invalid.',
            ]
        );
        $user = User::with('school')->find(Auth::id());

        $array = ['school_id' => $user->school->id, 'users_status' => 1];

        User::create(array_merge($validated, $array));

        return redirect()->back()->with('success', 'Admin added successfully');
    }

    public function adminDelete($adminID)
    {
        $admin = User::findOrFail($adminID);
        $admin->delete();

        return redirect()
            ->back()
            ->with('success', 'Admin deleted successfully');
    }
}
