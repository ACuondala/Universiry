<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    //


     /**
     * @OA\Post(
     *   tags={"Grade"},
     *   path="/api/grades",
     *   summary="add a grade to student",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(ref="#/components/schemas/RequestGradeResource")
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="OK",
     *     @OA\JsonContent(ref="#/components/schemas/GradeResource")
     *   ),
     *
     * )
     */
    public function store(Request $request){
        $enrollment=Enrollment::where(['student_id'=>$request->student_id, 'subject_id'=>$request->subject_id])->firstOrFail();

        $grade=Grade::updateOrCreate([
            'enrollment_id'=>$enrollment->id,
            'grade'=>$request->grade
        ]);

        $student=Student::find($request->student_id);
        $subject=Subject::find($request->subject_id);

        return response()->json([
            'student'=>$student->name,
            'subject'=>$subject->title,
            'grade'=>$grade->grade
        ]);

    }
}
