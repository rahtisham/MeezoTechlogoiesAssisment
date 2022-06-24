<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignCoursesTeacher extends Model
{
    use HasFactory;

    protected $table = 'courses_assign_to_teacher';

    protected $guarded = [];

    public static function teacherCourses($data)
    {
        $CoursesTeacher = AssignCoursesTeacher::create($data);
        return $CoursesTeacher;
    }

    public static function updateCourses($data , $id)
    {
        $update = AssignCoursesTeacher::where('id' , $id)->update($data);
        return $update;
    }

}
