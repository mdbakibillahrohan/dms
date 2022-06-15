<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function Login(Request $request)
    {
        $validateData = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if ($validateData) {
            $credentials = [
                'email' => $request["email"],
                'password' => $request["password"]
            ];
            if (Auth::guard('teacher')->attempt($credentials)) {
                return redirect()->route('teacher.dashboard');
            } else {
                return redirect()->route('teacher.loginView');
            }

        }

    }

    public function LoginView()
    {
        if(auth::guard('teacher')->check()){
            return redirect()->route('teacher.dashboard');
        }
        return view('teacher.auth.login');
    }

    public function Logout()
    {
        Auth::guard('teacher')->logout();
        return redirect()->route('teacher.loginView');
    }
}
