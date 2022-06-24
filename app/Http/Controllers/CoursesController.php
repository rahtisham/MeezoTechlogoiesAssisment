<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Courses;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Courses::all();
        return view('Courses.index' , ['courses' => $courses]);
    }

    public function create()
    {
        return view('Courses.create');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [

            'course'                  =>  ['required'],
        ], [
            'course.required'         => 'Course is Required',

        ])->validate();

        $courseData = [

            'coursesName' => $request->get('course'),

        ];

        $store =  Courses::storeCourses($courseData);

        if(!empty($store))
        {
            return redirect()->back()->with('success' , 'Courses Has Been Created Successfully!');
        }


    }

    public function edit($id)
    {
        $coursesEdit = Courses::find($id);
        return view('Courses.edit' , ['coursesEdit' => $coursesEdit]);
    }

    public function update(Request $request , $id)
    {
        Validator::make($request->all(), [

            'course'                  =>  ['required'],
        ], [
            'course.required'         => 'Course is Required',

        ])->validate();

        $courseUpdate = [

            'coursesName' => $request->get('course'),

        ];

        $update =  Courses::updateCourses($courseUpdate , $id);

        if(!empty($update))
        {
            return redirect()->back()->with('success' , 'Course Has Been Updated Successfully!');
        }
    }

    public function destroy($id)
    {
        $delete = Courses::where('id' , $id)->delete();
        if(!empty($delete))
        {
            return redirect()->back()->with('success' , 'Record Has Been Deleted Successfully!');
        }
    }
}
