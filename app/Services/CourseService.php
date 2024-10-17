<?php


namespace App\Services;

use App\Models\Course;
use App\Models\Student;
use App\Models\Subject;

class CourseService{

    protected $repository;

    public function __construct(){

    }

    public function getAll(){
        return response()->json([
            'courses'=>Course::get()
        ]);
    }

    public function save($request){
        $course=Course::create([
            'title'=>$request->title,
            'description'=>$request->description
        ]);
        return response()->json([
            'courses'=>$course
        ]);
    }

    public function enrollmentStudents($id){

        $courses=Course::findOrFail($id);



        $students = Student::whereIn('id', function($query) use ($courses) {
            $query->select('enrollments.student_id');
            $query->from('enrollments');
            $query->join('subjects', 'enrollments.subject_id', '=', 'subjects.id');
            $query->where('subjects.course_id', $courses->id);
        })->pluck('name');


        return response()->json([
            'course'=>$courses->title,
            'students'=>$students
        ]);

    }

    public function report($id){
        $courses=Course::findOrFail($id);

        $report = Subject::where('course_id', $courses->id)
        ->join('enrollments', 'subjects.id', '=', 'enrollments.subject_id')
        ->join('students', 'students.id', '=', 'enrollments.student_id')
        ->join('grades', 'grades.enrollment_id', '=', 'enrollments.id')
        ->select(
            'subjects.title as subject_name',
            'students.id',
            'students.name as student_name',
            'grades.grade'
        )
        ->get();


    $groupedReport = $report->groupBy('subject_name');
    return response()->json([
        'course'=>$courses->title,
        'subjects'=>$groupedReport
    ]);
    }
}
