<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    public function schoolDashBoardIndex()
    {
        $user = User::with('school')->find(Auth::id());
        return view('pages.dashboard', compact('user'));
    }
}
