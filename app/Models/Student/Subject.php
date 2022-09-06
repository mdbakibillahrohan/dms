<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }

    public function probidhan()
    {
        return $this->belongsTo(Probidhan::class, 'probidhan_id');
    }
}
