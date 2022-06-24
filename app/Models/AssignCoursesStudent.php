<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignCoursesStudent extends Model
{
    use HasFactory;

    protected $table = 'courses_assign_to_student';

    protected $guarded = [];

    public static function studentCourses($data)
    {
        $CoursesTeacher = AssignCoursesStudent::create($data);
        return $CoursesTeacher;
    }

    public static function UpdateCourses($data , $id)
    {
        $update = AssignCoursesStudent::where('id' , $id)->update($data);
        return $update;
    }

}
