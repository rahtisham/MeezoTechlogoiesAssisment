<?php

namespace App\Http\Controllers;

use App\Models\AssignCoursesStudent;
use App\Models\AssignCoursesTeacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teacherTeachCourses = AssignCoursesTeacher::where('teacher_id' , auth()->user()->id)->get();
        return view('Teacher.index' , ['teacherTeachCourses' => $teacherTeachCourses]);
    }

    public function student($id)
    {
        $classStudents = AssignCoursesTeacher::find($id);
        $course_id =  $classStudents->course_id;

        $getStudentListening = AssignCoursesStudent::where('course_id' , $course_id)->get();
        return view('Teacher.class-student' , ['getStudentListening' => $getStudentListening]);
    }
}
