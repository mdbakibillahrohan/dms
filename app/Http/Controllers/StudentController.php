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
use Illuminate\Support\Facades\Storage;
use Auth;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Str;
// use Image;
use Intervention\Image\Facades\Image;

class StudentController extends Controller
{
    //Add student
    public function add(Request $request)
    {

        $name = null;
        $validate = $request->validate([
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'email' => 'required|unique:users',
            'dob' => 'required',
            'gurdian' => 'required',
            'contact_number' => 'max:11',
            'username' => 'required|unique:users',
            'password' => 'required|max:15|min:5',
            'gender_id' => 'required',
            'shift_id' => 'required',
            'semester_id' => 'required',
        ]);

        if ($validate) {
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $extension = '.' . $photo->getClientOriginalExtension();
                $name = Str::random(20) . $extension;

                $image = Image::make($photo->getRealPath());
                $image->resize(400, 300);
                $image->save("../public/uploaded_files/photo/$name");
            }



            // $path = $photo->storeAs(
            //     'photo', $name, 'uploaded_files'
            // );


            $insert = DB::table('users')->insert([
                'name' => $request->name,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'email' => $request->email,
                'dob' => $request->dob,
                'gurdian' => $request->gurdian,
                'contact_number' => $request->contact_number,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'gender_id' => $request->gender_id,
                'shift_id' => $request->shift_id,
                'semester_id' => $request->semester_id,
                'picture' => $name
            ]);

            if ($insert) {
                $notification = "Successfully Added Student to database";
                $request->session()->flash('notification', $notification);
                return back();
            }
        }


        $notification = "Failed to add the student";
        $request->session()->flash('notification', $notification);
        return back();
    }

    public function update($id, Request $request): \Illuminate\Http\RedirectResponse
    {
        $isValidate = $request->validate([
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'dob' => 'required',
            'gurdian' => 'required',
            'contact_number' => 'max:11',
            'gender_id' => 'required',
            'shift_id' => 'required',
            'semester_id' => 'required',
        ]);
        if ($isValidate) {
            $update = DB::table('users')->where('id', $id)->update([
                'name' => $request->name,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'dob' => $request->dob,
                'gurdian' => $request->gurdian,
                'contact_number' => $request->contact_number,
                'password' => Hash::make($request->password),
                'gender_id' => $request->gender_id,
                'shift_id' => $request->shift_id,
                'semester_id' => $request->semester_id,
            ]);
            if ($update) {
                $notification = "Successfully Updated Student to database";
                $request->session()->flash('notification', $notification);
                return back();
            }
            $notification = "Error occurred";
            $request->session()->flash('notification', $notification);
            return back();
        }
    }

    public function showAddForm()
    {
        $semester = Semester::all();
        $shift = Shift::all();
        $gender = Gender::all();
        return view('global.student.add_student', ['semester' => $semester, 'shift' => $shift, 'gender' => $gender]);
    }

    public function showEditForm($id)
    {
        $student = User::find($id);
        $semester = Semester::all();
        $shift = Shift::all();
        $gender = Gender::all();
        return view('global.student.edit_student', ['student' => $student, 'semester' => $semester, 'shift' => $shift, 'gender' => $gender]);
    }

    public function studentList(Request $request)
    {
        $search = $request->search ?? "";
        if ($search != "") {
            $Student = User::where('name', 'LIKE', "%$search%")->paginate(5);
        } else {
            $Student = User::paginate(10);
        }
        return view('global.student.list_of_student', ['Students' => $Student]);
    }
    public function destroy($id)
    {
        $Student = User::find($id);
        $name = $Student->name;
        $Student->delete();
        $notification = "Successfully deleted $name from database";
        session()->flash('notification', $notification);
        return redirect()->route('student.list');
    }
}
