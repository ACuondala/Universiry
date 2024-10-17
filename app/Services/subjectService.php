<?php


namespace App\Services;

use App\Models\Course;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;

class SubjectService{

    protected $repository;

    public function __construct(){

    }

    public function getAll(){
        return response()->json([
            'courses'=>Subject::get()
        ]);
    }

    public function save($request){
        $subject=Subject::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'course_id'=>$request->course_id,
            'teacher_id'=>$request->teacher_id,

        ]);

        return response()->json([
            'subject'=>$subject
        ]);
    }

    public function allStudentAverage($id){
        $subjects = Subject::findOrFail($id);
        $average = Grade::whereHas('enrollment', function ($query) use ($subjects) {
            $query->where('subject_id', $subjects->id);
        })
        ->avg('grade'); // Calcula a média das notas
        //dd($average);

        return response()->json([
            'subject'=>$subjects->title,
            'média'=>number_format($average, 2)
        ]);
    }
}
