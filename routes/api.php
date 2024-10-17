<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;






Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::controller(CourseController::class)->group(function(){
    Route::get('/courses','index')->name('courses.index');
    Route::post('/courses','store')->name('courses.store');
    Route::get('/courses/{id}/students', 'seeEnrollmentStudents')->name('courses.seeEnrollmentStudents');
    Route::get('/courses/{id}/detailed-report','detailReport')->name('courses.detailReport');

});

Route::controller(TeacherController::class)->group(function(){
    Route::get('/teachers','index')->name('teachers.index');
    Route::post('/teachers','store')->name('teachers.store');
    Route::get('/teachers/{id}/subjects','seeTeacherSubjects')->name('teachers.seeTeacherSubjects');
});

Route::controller(StudentController::class)->group(function(){
    Route::get('/students','index')->name('students.index');
    Route::post('/students','store')->name('students.store');
    Route::get('/students/{id}/grades','seeStudentGrades')->name('students.seeStudentGrades');
});

Route::controller(SubjectController::class)->group(function(){
    Route::get('/subjects','index')->name('subjects.index');
    Route::post('/subjects','store')->name('subjects.store');
    Route::get('/subjects/{id}/average-grade', 'seeAllStudentAverage')->name('subjects.seeAllStudentAverage');
});

Route::controller(EnrollmentController::class)->group(function(){
    Route::get('/enrollments','index')->name('enrollments.index');
    Route::post('/enrollments','store')->name('enrollments.store');
});

Route::controller(GradeController::class)->group(function(){
    Route::post('/grades', 'store')->name('grades.store');
});

Route::controller(ReportController::class)->group(function(){
    Route::get('/enrollments','index')->name('enrollments.index');
});
