<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentAssignCourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherAssignCourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/' , [DashboardController::class , 'redirection'])->name('redirection');
Route::get('register' , [DashboardController::class , 'registerRedirection'])->name('register');

Route::group(['middleware' => 'auth'] , function(){

    Route::get('dashboard' , [DashboardController::class , 'index'])->name('dashboard');

    Route::group(['middleware' => 'CheckAuthPermission:admin' , 'prefix' => 'admin' , 'as' => 'admin'], function(){

        Route::get('user-registration' , [UsersController::class , 'userRegister'])->name('user-registration');
        Route::post('user-store' , [UsersController::class , 'store'])->name('user-store');
        Route::get('user-edit/{id}' , [UsersController::class , 'edit'])->name('user-edit');
        Route::post('user-update/{id}' , [UsersController::class , 'update'])->name('user-update');
        Route::get('user-delete/{id}' , [UsersController::class , 'destroy'])->name('user-delete');

        Route::get('/' , [UsersController::class , 'index'])->name('/');
        Route::get('teacher' , [UsersController::class , 'teacher'])->name('teacher');
        Route::get('student' , [UsersController::class , 'student'])->name('student');

        Route::get('courses' , [CoursesController::class , 'index'])->name('courses');
        Route::get('create' , [CoursesController::class , 'create'])->name('create');
        Route::post('course-store' , [CoursesController::class , 'store'])->name('course-store');
        Route::get('course-edit/{id}' , [CoursesController::class , 'edit'])->name('course-edit');
        Route::post('course-update/{id}' , [CoursesController::class , 'update'])->name('course-update');
        Route::get('course-delete/{id}' , [CoursesController::class , 'destroy'])->name('course-delete');

        Route::get('course-assign-to-teacher' , [TeacherAssignCourseController::class , 'index'])->name('course-assign-to-teacher');
        Route::get('create-course-assign-to-teacher' , [TeacherAssignCourseController::class , 'create'])->name('create-course-assign-to-teacher');
        Route::post('store-course-assign-to-teacher' , [TeacherAssignCourseController::class , 'store'])->name('store-course-assign-to-teacher');
        Route::get('teacher-course-edit/{id}' , [TeacherAssignCourseController::class , 'edit'])->name('teacher-course-edit');
        Route::post('teacher-course-update/{id}' , [TeacherAssignCourseController::class , 'update'])->name('teacher-course-update');
        Route::get('delete-assigned-course-teacher/{id}' , [TeacherAssignCourseController::class , 'destroy'])->name('delete-assigned-course-teacher');

        Route::get('course-assign-to-student' , [StudentAssignCourseController::class , 'index'])->name('course-assign-to-student');
        Route::get('create-course-assign-to-student' , [StudentAssignCourseController::class , 'create'])->name('create-course-assign-to-student');
        Route::post('store-course-assign-to-student' , [StudentAssignCourseController::class , 'store'])->name('store-course-assign-to-student');
        Route::get('student-course-edit/{id}' , [StudentAssignCourseController::class , 'edit'])->name('student-course-edit');
        Route::post('student-course-update/{id}' , [StudentAssignCourseController::class , 'update'])->name('student-course-update');
        Route::get('delete-assigned-course/{id}' , [StudentAssignCourseController::class , 'destroy'])->name('delete-assigned-course');


    });


    Route::group(['middleware' => 'CheckAuthPermission:student' , 'prefix' => 'student' , 'as' => 'student'], function(){

        Route::get('Courses' , [StudentController::class , 'index'])->name('Courses');
        Route::get('teacher/{id}' , [StudentController::class , 'classTeacher'])->name('teacher');

    });


    Route::group(['middleware' => 'CheckAuthPermission:teacher' , 'prefix' => 'teacher' , 'as' => 'teacher'], function(){

        Route::get('Courses' , [TeacherController::class , 'index'])->name('Courses');
        Route::get('student/{id}' , [TeacherController::class , 'student'])->name('student');

    });

}); // End of Middleware




// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
