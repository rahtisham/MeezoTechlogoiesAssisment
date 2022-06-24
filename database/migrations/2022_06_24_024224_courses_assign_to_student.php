<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CoursesAssignToStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_assign_to_student', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id');
            $table->string('courseName');
            $table->integer('student_id');
            $table->string('studentName');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses_assign_to_student');
    }
}
