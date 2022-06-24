<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Courses;
use App\Models\User;
use App\Models\AssignCoursesTeacher;

class TeacherAssignCourseController extends Controller
{
    public function index()
    {
        $assignCourses = AssignCoursesTeacher::all();
        return view('AssignCourses.TeacherCourses.index' , ['assignCourses' => $assignCourses]);
    }

    public function create()
    {
        $courses = Courses::all();
        $teachers = User::where('role_id' , '2')->get();
        return view('AssignCourses.TeacherCourses.create' , ['courses' => $courses , 'teachers' => $teachers]);
    }

    public function store(Request $request)
    {
        $course = $request->get('course');
        $teacher= $request->get('teacher');

        Validator::make($request->all(), [

            'teacher'                  =>   ['required'],
            'course'                   =>   ['required'],
        ], [
            'teacher.required'         =>   'Teacher is Required',
            'course.required'          =>   'Course is Required',

        ])->validate();


        $coursesExpload = explode("_",$course);
        $course_id = $coursesExpload[0];
        $course_name = $coursesExpload[1];

        $teacherExpload = explode("_",$teacher);
        $teacher_id = $teacherExpload[0];
        $teacher_name = $teacherExpload[1];

         $check_duplicat_courses = AssignCoursesTeacher::where('course_id' , $course_id )
                                                        ->Where('teacher_id' , $teacher_id)
                                                        ->first();
        if($check_duplicat_courses)
        {
            return redirect()->back()->with('error' , 'This Course already is Assigned to Teacher !');
        }
        else
        {
            $data = [

                'course_id' => $course_id,
                'courseName' => $course_name,
                'teacher_id' => $teacher_id,
                'teacherName' => $teacher_name,

            ];

            $store =  AssignCoursesTeacher::teacherCourses($data);

            if(!empty($store))
            {
                return redirect()->back()->with('success' , 'Courses Has Been Assigned to Teacher Successfully!');
            }
        }

    }

    public function edit($id)
    {
        $courses = Courses::all();
        $teachers = User::where('role_id' , '2')->get();
        $updateCourses = AssignCoursesTeacher::find($id);
        return view('AssignCourses.TeacherCourses.edit' ,
                                                    [
                                                        'courses' => $courses ,
                                                        'teachers' => $teachers ,
                                                        'updateCourses' => $updateCourses
                                                    ]);

    }

    public function update(Request $request , $id)
    {
        $course = $request->get('course');
        $teacher= $request->get('teacher');

        Validator::make($request->all(), [

            'teacher'                  =>   ['required'],
            'course'                   =>   ['required'],
        ], [
            'teacher.required'         =>   'Teacher is Required',
            'course.required'          =>   'Course is Required',

        ])->validate();


        $coursesExpload = explode("_",$course);
         $course_id = $coursesExpload[0];
        $course_name = $coursesExpload[1];

        $teacherExpload = explode("_",$teacher);
         $teacher_id = $teacherExpload[0];
        $teacher_name = $teacherExpload[1];

         $check_duplicat_courses = AssignCoursesTeacher::where('course_id' , $course_id )
                                                        ->Where('teacher_id' , $teacher_id)
                                                        ->first();
        if($check_duplicat_courses)
        {
            return redirect()->back()->with('error' , 'This Course already is Assigned to Teacher !');
        }
        else
        {

            $data = [

                'course_id' => $course_id,
                'courseName' => $course_name,
                'teacher_id' => $teacher_id,
                'teacherName' => $teacher_name,

            ];

            $update =  AssignCoursesTeacher::updateCourses($data , $id);

            if(!empty($update))
            {
                return redirect()->back()->with('success' , 'Courses Has Been Updated Successfully!');
            }
        }
    }

    public function destroy($id)
    {
        $delete = AssignCoursesTeacher::where('id' , $id)
                                            ->delete();
        return redirect()->back()->with('success' , 'Record Has Been Deleted Successfully!');
    }
}

