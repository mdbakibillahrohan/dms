<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Probidhan extends Model
{
    use HasFactory;

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'probidhan_id');
    }
}
