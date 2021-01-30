<?php

namespace App\Http\Controllers;

use App\Student;
use App\Course;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function studentjson() {
        $students = Student::all();
        return $students;
    }

    public function coursejson() {
        $courses = Course::all();
        return $courses;
    }

    public function studentlist() {
        $students = Student::all();
        return view('studetronic/students')->with('students', $students);
    }

    /* tarpeeton
    public function studentincourses() {
        $student = Student::find(1); // Haetaan opiskelijan id=1 tiedot
        // return $student->courses; // Kokeile ensin, että tämä palautus toimii
        return view('studetronic/studentincourses')->with('studentincourses', $student->courses);
    }
    */

    public function studentcredits() {
        // Luetaan linkin mukana tullut käyttäjän id
        $id = request('id');

        $studentcredits = DB::table('student')
        ->select('student.id',
            DB::raw("student.lastname AS Sukunimi"),
            DB::raw("student.firstname AS Etunimi"),
            DB::raw("course.name as Kurssi"),
            'course.credits',
            'student_has_course.created_at'
            )
        ->join('student_has_course', 'student.id', '=', 'student_has_course.student_id')
        ->join('course', 'course.id', '=', 'student_has_course.course_id')              
        ->where('student.id','=',"$id")             
        ->orderBy('course.credits', 'desc')
        ->get();

        // return $studentcredits;
        return view('studetronic/studentcredits')->with('studentcredits', $studentcredits);
    }

    public function studentform() {
        return view('studetronic/studentform');
    }

    public function store() {
        Student::create(request()->all());
        return redirect(url('/student'));  
    }
}