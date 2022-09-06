<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function AdminDashboard(Request $request)
    {

        if ($request->session()->has('dashboard_type')) {
            $request->session()->forget('dashboard_type');
        }
        $request->session()->put('dashboard_type', 'admin');

        //        return session('dashboard_type');
        return view('admin.pages.dashboard');
    }
    public function TeacherDashboard(Request $request)
    {
        if ($request->session()->has('dashboard_type')) {
            $request->session()->forget('dashboard_type');
        }
        $request->session()->put('dashboard_type', 'teacher');
        return view('teacher.pages.dashboard');
    }
}
