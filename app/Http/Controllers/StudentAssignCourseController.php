<?php

namespace App\Http\Controllers;

use App\Models\AssignCoursesStudent;
use Illuminate\Support\Facades\Validator;
use App\Models\Courses;
use App\Models\User;
use Illuminate\Http\Request;

class StudentAssignCourseController extends Controller
{
    public function index()
    {
        $assignCourses = AssignCoursesStudent::all();
        return view('AssignCourses.StudentCourses.index' , ['assignCourses' => $assignCourses]);
    }

    public function create()
    {
        $courses = Courses::all();
        $students = User::where('role_id' , '3')->get();
        return view('AssignCourses.StudentCourses.create' , ['courses' => $courses , 'students' => $students]);
    }

    public function store(Request $request)
    {
        $course = $request->get('course');
        $student= $request->get('student');

        Validator::make($request->all(), [

            'student'                  =>   ['required'],
            'course'                   =>   ['required'],
        ], [
            'student.required'         =>   'Student is Required',
            'course.required'          =>   'Course is Required',

        ])->validate();


        $coursesExpload = explode("_",$course);
        $course_id = $coursesExpload[0];
        $course_name = $coursesExpload[1];

        $studentExpload = explode("_",$student);
        $student_id = $studentExpload[0];
        $student_name = $studentExpload[1];

        $check_duplicat_courses = AssignCoursesStudent::where('course_id' , $course_id )
                                                        ->Where('student_id' , $student_id)
                                                        ->first();

        if($check_duplicat_courses)
        {
            return redirect()->back()->with('error' , 'This Course already is Assigned to Student !');
        }
        else
        {
            $studentdata = [

                'course_id' => $course_id,
                'courseName' => $course_name,
                'student_id' => $student_id,
                'studentName' => $student_name,

            ];

            $store =  AssignCoursesStudent::studentCourses($studentdata);

            if(!empty($store))
            {
                return redirect()->back()->with('success' , 'Courses Has Been Assigned to Student Successfully!');
            }
        }


    }

    public static function edit($id)
    {
        $courses = Courses::all();
        $students = User::where('role_id' , '3')->get();
        $updateCourses = AssignCoursesStudent::find($id);
        return view('AssignCourses.StudentCourses.edit' ,
                                                        [
                                                            'courses' => $courses ,
                                                            'students' => $students ,
                                                            'updateCourses' => $updateCourses
                                                        ]);
    }

    public function update(Request $request , $id)
    {
        $course = $request->get('course');
        $student= $request->get('student');

        Validator::make($request->all(), [

            'student'                  =>   ['required'],
            'course'                   =>   ['required'],
        ], [
            'student.required'         =>   'Student is Required',
            'course.required'          =>   'Course is Required',

        ])->validate();


        $coursesExpload = explode("_",$course);
        $course_id = $coursesExpload[0];
        $course_name = $coursesExpload[1];

        $studentExpload = explode("_",$student);
        $student_id = $studentExpload[0];
        $student_name = $studentExpload[1];

        $check_duplicat_courses = AssignCoursesStudent::where('course_id' , $course_id )
                                                        ->Where('student_id' , $student_id)
                                                        ->first();

        if($check_duplicat_courses)
        {
            return redirect()->back()->with('error' , 'This Course already is Assigned to Student !');
        }
        else
        {
            $studentudpate = [

                'course_id' => $course_id,
                'courseName' => $course_name,
                'student_id' => $student_id,
                'studentName' => $student_name,

            ];

            $store =  AssignCoursesStudent::UpdateCourses($studentudpate , $id);

            if(!empty($store))
            {
                return redirect()->back()->with('success' , 'Courses Has Been Assigned to Student Successfully!');
            }
        }
    }

    public function destroy($id)
    {
        $delete = AssignCoursesStudent::where('id' , $id)
                                        ->delete();
        return redirect()->back()->with('success' , 'Record Has Been Deleted Successfully!');
    }



}
