<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use App\Models\Teacher;
use App\Models\Teacher\Teacher_Rank;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('teacher.pages.list_of_teacher', ['teachers' => $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gender = Gender::all();
        $ranks = Teacher_Rank::all();
        return view('teacher.pages.add_teacher', ['gender' => $gender, 'ranks' => $ranks]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = null;
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:teachers',
            'contact_number' => 'max:11',
            'username' => 'required|unique:teachers',
            'password' => 'required|max:15|min:5',
            'gender_id' => 'required',
            'rank_id' => 'required',
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


            $insert = DB::table('teachers')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'dob' => $request->dob,
                'contact_number' => $request->contact_number,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'gender_id' => $request->gender_id,
                'ranks_id' => $request->rank_id,
                'picture' => $name
            ]);

            if ($insert) {
                $notification = [
                    "message" => " Successfully Added Teacher to database",
                    "type" => "success"
                ];
                $request->session()->flash('notification', $notification);
                return back();
            }
        }


        $notification = "Failed to add the teacher";
        $request->session()->flash('notification', $notification);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::find($id);
        $gender = Gender::all();
        $ranks = Teacher_Rank::all();
        return view('teacher.pages.edit_teacher', ['teacher' => $teacher, 'gender' => $gender, 'ranks' => $ranks]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $isValidate = $request->validate([
            'name' => 'required',
            'dob' => 'required',
            'contact_number' => 'max:11',
            'gender_id' => 'required',
            'rank_id' => 'required',
        ]);
        if ($isValidate) {
            $update = DB::table('teachers')->where('id', $id)->update([
                'name' => $request->name,
                'dob' => $request->dob,
                'contact_number' => $request->contact_number,
                'gender_id' => $request->gender_id,
                'ranks_id' => $request->rank_id,
            ]);
            if ($update) {
                $notification = [
                    "message" => "Successfully Updated teacher to database",
                    "type" => "success"
                ];
                $request->session()->flash('notification', $notification);
                return back();
            }
            $notification = [
                "message" => "Error occured",
                "type" => "warning"
            ];
            $request->session()->flash('notification', $notification);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Teacher = Teacher::find($id);
        $name = $Teacher->name;
        if (Storage::disk('uploaded_files')->exists('photo/' . $Teacher->picture)) {
            $deletePic = Storage::disk('uploaded_files')->delete('photo/' . $Teacher->picture);
            if ($deletePic) {
                $Teacher->delete();
                $notification = [
                    "message" => "Successfully deleted $name from database",
                    "type" => "success"
                ];
                session()->flash('notification', $notification);
                return redirect()->route('teacher.all');
            }
            $notification = [
                "message" => "Error",
                "type" => "warning"
            ];
            session()->flash('notification', $notification);
            return redirect()->route('teacher.all');
        }
        $Teacher->delete();
        $notification = [
            "message" => "Successfully deleted $name from database",
            "type" => "success"
        ];
        session()->flash('notification', $notification);
        return redirect()->route('teacher.all');
    }



    /**
     * Change password form for teacher.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changePasswordForm($id)
    {
        return view('teacher.pages.change_password', ['id' => $id]);
    }



    /**
     * Change password for teacher.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request, $id)
    {
        $validate = $request->validate([
            'yourPassword' => 'required',
            'newPassword' => 'required|max:15|min:8'
        ]);
        if ($validate) {
            $yourPassword = $request->yourPassword;
            $newPassword = $request->newPassword;
            $Teacher = Teacher::find($id);
            if (isset(Auth::guard('admin')->user()->name)) {
                if (Hash::check($yourPassword, Auth::guard('admin')->user()->password)) {
                    $Teacher->password = Hash::make($newPassword);
                    $Teacher->save();
                    $notification = [
                        "message" => "Successfully updated password",
                        "type" => "success"
                    ];
                    session()->flash('notification', $notification);
                    return back();
                }
                $notification = [
                    "message" => "Your password is incorrect",
                    "type" => "warning"
                ];
                session()->flash('notification', $notification);
                return back();
            }
            if (Hash::check($yourPassword, Auth::guard('teacher')->user()->password)) {
                $Teacher->password = Hash::make($newPassword);
                $Teacher->save();
                $notification = [
                    "message" => "Successfully updated password",
                    "type" => "success"
                ];
                session()->flash('notification', $notification);
                return back();
            }
            $notification = [
                "message" => "Your password is incorrect",
                "type" => "warning"
            ];
            session()->flash('notification', $notification);
            return back();
        }
    }
}
