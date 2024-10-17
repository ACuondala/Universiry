<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Grade;
use App\Models\Student;
use App\Services\StudentsService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //

    private $service;

    public function __construct(StudentsService $service){
        $this->service=$service;
    }

    //
     /**
     * @OA\Get(
     *   tags={"Student"},
     *   path="/api/students",
     *   summary="Show all Students",
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(ref="#/components/schemas/Resource")
     *   )
     *
     * )
     */
    public function index(){
        return $this->service->getAll();
    }

    /**
     * @OA\Post(
     *   tags={"Student"},
     *   path="/api/students",
     *   summary="Create a new Teacher",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(ref="#/components/schemas/RequestResource")
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="OK",
     *     @OA\JsonContent(ref="#/components/schemas/Resource")
     *   ),
     *
     * )
     */
    public function store(Request $request){
        return $this->service->save($request);
    }

     /**
     * @OA\Get(
     *   tags={"Student"},
     *   path="/api/students/{id}/grades",
     *   summary="return all enrollment student in a spacific course",
     *   @OA\Parameter(
     *     name="id",
     *     description="",
     *     required=true,
     *     in="path",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(response=200, description="OK"),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function seeStudentGrades($id){


       return $this->service->studentGrades($id)
       ;
    }
}
