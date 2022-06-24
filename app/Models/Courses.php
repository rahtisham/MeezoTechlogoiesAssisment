<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function storeCourses($coursesDataa)
    {
        $course = Courses::create($coursesDataa);
        return $course;
    }

    public static function updateCourses($data , $id)
    {
        $courseUpdate = Courses::where('id' , $id)->update($data);
        return $courseUpdate;

    }
}
