<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function adminManagementIndex()
    {
        $roles = Role::all();

        $user = User::with('school')->find(Auth::id());

        $admins = User::with('role')->where('school_id', $user->school->id)->get();
        return view('pages.Settings.admin-management', compact('roles','admins'));
    }
}
