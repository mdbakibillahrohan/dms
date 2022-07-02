<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use App\Models\Teacher\Teacher_Rank;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'gurdian' => 'required',
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
