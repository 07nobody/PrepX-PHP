<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Test;
use App\Models\Result;

class DashboardController extends Controller
{
    public function studentDashboard()
    {
        $user = auth()->user();
        $tests = Test::where('created_by', $user->id)->get();
        $results = Result::where('user_id', $user->id)->get();

        return view('dashboard.student', compact('user', 'tests', 'results'));
    }

    public function teacherDashboard()
    {
        $user = auth()->user();
        $tests = Test::where('created_by', $user->id)->get();

        return view('dashboard.teacher', compact('user', 'tests'));
    }

    public function adminDashboard()
    {
        $users = User::all();
        $tests = Test::all();
        $results = Result::all();

        return view('dashboard.admin', compact('users', 'tests', 'results'));
    }
}
