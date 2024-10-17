<?php


namespace App\Services;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Subject;

class StudentsService{

    protected $repository;

    public function __construct(){

    }

    public function getAll(){
        return response()->json([
            'students'=>Student::get()
        ]);
    }

    public function save($request){
        $student=Student::create([
            'name'=>$request->name,
            'email'=>$request->email
        ]);

        return response()->json([
            'student'=>$student
        ]);
    }

    public function studentGrades($id){
        $student=Student::find($id);


        $grades = Enrollment::where('student_id', $student->id)
        ->join('grades', 'enrollments.id', '=', 'grades.enrollment_id')
        ->join('subjects', 'subjects.id', '=', 'enrollments.subject_id')
        ->join('courses', 'courses.id', '=', 'subjects.course_id')
        ->select('grades.grade', 'subjects.title as subject_name', 'courses.title as course_title')
        ->get();

       return response()->json([
        'student'=>$student->name,
        'details'=>$grades
       ]);
    }


}
