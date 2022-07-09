<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student\Probidhan;
use App\Models\Student\Semester;
use App\Models\Student\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request->search)) {
            $searchText = $request->search;
            $subjects = Subject::where('name', 'LIKE', "%$searchText%")->paginate(10);
            return view('global.subject.subject_all', ['subjects' => $subjects]);
        }
        $subjects = Subject::paginate(10);
        return view('global.subject.subject_all', ['subjects' => $subjects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semester = Semester::all();
        $probidhan = Probidhan::all();
        return view('global.subject.subject_add', ['semester' => $semester, 'probidhan' => $probidhan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'code' => 'required',
            'semester_id' => 'required',
            'probidhan_id' => 'required'
        ]);

        if ($validate) {
            $subject = new Subject();
            $subject->name = $request->name;
            $subject->subject_code = $request->code;
            $subject->semester_id = $request->semester_id;
            $subject->probidhan_id = $request->probidhan_id;
            if ($subject->save()) {
                $notification = [
                    "message" => "Successfully inserted data into database",
                    "type" => "success"
                ];
                session()->flash('notification', $notification);
                return back();
            }
            $notification = [
                "message" => "Error occured",
                "type" => "warning"
            ];
            session()->flash('notification', $notification);
            return back();
        }
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
        $subject = Subject::find($id);
        $semester = Semester::all();
        $probidhan = Probidhan::all();
        return view('global.subject.subject_edit', ['subject' => $subject, 'semester' => $semester, 'probidhan' => $probidhan]);
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
        $validate = $request->validate([
            'name' => 'required',
            'code' => 'required',
            'semester_id' => 'required',
            'probidhan_id' => 'required'
        ]);

        if ($validate) {
            $subject = Subject::find($id);
            $subject->name = $request->name;
            $subject->subject_code = $request->code;
            $subject->semester_id = $request->semester_id;
            $subject->probidhan_id = $request->probidhan_id;
            if ($subject->update()) {
                $notification = [
                    "message" => "Successfully updated data into database",
                    "type" => "success"
                ];
                session()->flash('notification', $notification);
                return back();
            }
            $notification = [
                "message" => "Error occured",
                "type" => "warning"
            ];
            session()->flash('notification', $notification);
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
        $subject = Subject::find($id);
        if ($subject->delete()) {
            $notification = [
                "message" => "Successfully deleted subject",
                "type" => "success"
            ];
            session()->flash('notification', $notification);
            return back();
        }
        $notification = [
            "message" => "Error occured",
            "type" => "warning"
        ];
        session()->flash('notification', $notification);
        return back();
    }
}
