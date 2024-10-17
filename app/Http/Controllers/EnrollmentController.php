<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    //


    /**
     * @OA\Post(
     *   tags={"Enrollment"},
     *   path="/api/enrollments",
     *   summary="Enrollment student to a subject",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(ref="#/components/schemas/RequestEnrollmentResource")
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="OK",
     *     @OA\JsonContent(ref="#/components/schemas/EnrollmentResource")
     *   ),
     *
     * )
     */
    public function store(Request $request){
        $student=Student::findOrFail($request->student_id);
        $student->enrollments()->attach($request->subject_id);

        return response()->json([
            'student'=>$student
        ]);
    }
}
