<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $validateData = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if($validateData){
            $credentials = [
                'email'=>$request["email"],
                'password'=>$request["password"],
            ];
            if(Auth::guard('admin')->attempt($credentials)){
                return redirect()->route('admin.dashboard');
            }
            $request->session()->flash('status', "Please enter the right credentials");
            return redirect()->route('admin.loginView');

        }

    }
    public function loginView(){
        if(auth::guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.loginView');
    }
}
