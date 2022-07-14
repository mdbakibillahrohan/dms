<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\Teacher\Teacher_Rank;
use Illuminate\Http\Request;

class TeacherDataController extends Controller
{
    public function show($id)
    {
        $Teacher = Teacher::find($id);
        $Rank = Teacher_Rank::find($Teacher->ranks_id);
        return ['teacher' => $Teacher, 'rank' => $Rank];
    }
}
