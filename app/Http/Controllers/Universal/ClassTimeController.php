<?php

namespace App\Http\Controllers\Universal;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use App\Models\ClassTime;
use App\Models\Days;
use App\Models\Student\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Teachers = Teacher::all();
        $Subjects = Subject::all();
        $Days = Days::all();
        $ClassRooms = ClassRoom::all();
        return view('global.class.class_time.add_class_time', ['Teachers' => $Teachers, 'Subjects' => $Subjects, 'Days' => $Days, 'ClassRooms' => $ClassRooms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassTime  $classTime
     * @return \Illuminate\Http\Response
     */
    public function show(ClassTime $classTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassTime  $classTime
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassTime $classTime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassTime  $classTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassTime $classTime)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassTime  $classTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassTime $classTime)
    {
        //
    }
}
