<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\Teacher\Teacher_Rank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherDataController extends Controller
{
    public function show($id)
    {
        $Teacher = DB::table('teacher__ranks')->join('teachers', 'teacher__ranks.id', '=', 'teachers.ranks_id')->where('teachers.id', $id)->select('teachers.name', 'teachers.picture', 'teachers.id', 'teacher__ranks.rank_name')->get();
        // return ['teacher' => $Teacher, 'rank' => $Rank];
        return $Teacher;
    }
}
