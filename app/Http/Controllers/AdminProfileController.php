<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    public function schoolAdminProfileIndex()
    {
        $user = User::with('role')->find(Auth::id());
        return view('pages.admin-profile', compact('user'));
    }

    public function schoolAdminProfileUpdate(Request $request)
    {
        $request->validate([
            'userName' => 'required|string|min:3|max:255',
        ]);

        User::where('id', Auth::id())
            ->update([
                'name' => $request->userName
            ]);

        return redirect()->back()->with('success', 'Name updated successfully!');
    }
}
