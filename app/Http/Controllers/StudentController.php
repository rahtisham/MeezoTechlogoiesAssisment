<?php

namespace App\Http\Controllers;

use App\Models\AssignCoursesStudent;
use App\Models\AssignCoursesTeacher;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $studentCourses = AssignCoursesStudent::where('student_id' , auth()->user()->id)->get();
        return view('Student.index' , ['studentCourses' => $studentCourses]);
    }

    public function classTeacher($id)
    {
        $classTeachers = AssignCoursesTeacher::where('course_id' , $id)->get();
        return view('Student.class-Teacher' , ['classTeachers' => $classTeachers]);
    }
}
