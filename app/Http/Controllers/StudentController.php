<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use App\Models\Student\Semester;
use App\Models\Student\Shift;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    //Add student
    public function add(Request $request){
        $insert = DB::table('users')->insert([
            'name'=>$request->name,
            'father_name'=>$request->father_name,
            'mother_name'=>$request->mother_name,
            'email'=>$request->email,
            'dob'=>$request->dob,
            'gurdian'=>$request->gurdian,
            'contact_number'=>$request->contact_number,
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
            'gender_id'=>$request->gender_id,
            'shift_id'=>$request->shift_id,
            'semester_id'=>$request->semester_id,
        ]);

        if($insert){
            $notification = "Successfully Added Student to database";
            return back()->with($notification);
        }
        $notification = "Error occurred";
        return back()->with($notification);
    }

    public function showForm(){
        $semester = Semester::all();
        $shift = Shift::all();
        $gender = Gender::all();
        return view('global.student.add_student', ['semester'=>$semester, 'shift'=>$shift, 'gender'=>$gender]);
    }
}
