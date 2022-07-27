<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use App\Models\Days;
use App\Models\Student\Subject;
use Illuminate\Http\Request;

class ClassDataController extends Controller
{
    public function routineDetails(Request $request)
    {
        $subject = Subject::find($request->subject_id);
        $classRoom = ClassRoom::find($request->class_room_id);
        $day = Days::find($request->day_id);
        return ['subject' => $subject, 'classRoom' => $classRoom, 'day' => $day];
    }
}
