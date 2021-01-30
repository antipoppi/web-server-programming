<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';

    public function students()
    {
        return $this->belongsToMany('App\Student', 'student_has_course', 'course_id', 'student_id');
    }
}