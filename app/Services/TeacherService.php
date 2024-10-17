<?php


namespace App\Services;


use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;

class TeacherService{


    public function getAll(){
        return response()->json([
            'teachers'=>Teacher::get()
        ]);
    }

    public function save($request){
        $teacher=Teacher::create([
            'name'=>$request->name,
            'email'=>$request->email
        ]);

        return response()->json([
            'teacher'=>$teacher
        ]);
    }

    public function teacherSubjects($id){
        $teacher=Teacher::findOrFail($id);




        $subjects = Subject::where('teacher_id', $teacher->id)
            ->join('courses', 'courses.id', '=', 'subjects.course_id')
            ->join('enrollments', 'subjects.id', '=', 'enrollments.subject_id')
            ->join('students', 'students.id', '=', 'enrollments.student_id')
            ->select(
                'subjects.title as subject_name',
                'courses.title as course_title',
                DB::raw('GROUP_CONCAT(students.name SEPARATOR ", ") as student_names') // Concatenar os nomes dos alunos
            )
            ->groupBy('subjects.id', 'courses.id', 'subjects.title', 'courses.title') // Agrupar pela disciplina e pelo curso
            ->get();



       return response()->json([
        'teacher'=>$teacher->name,
        'details'=>$subjects
       ]);
    }

}
