<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Subject;
use App\Services\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private $service;

    public function __construct(CourseService $service){
        $this->service=$service;
    }

    //
    /**
     * @OA\Get(
     *   tags={"Course"},
     *   path="/api/courses",
     *   summary="list all courses",
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(ref="#/components/schemas/CourseResource")
     *   )
     *
     *
     * )
     */
    public function index(){
        return $this->service->getAll();

    }


   /**
    * @OA\Post(
    *   tags={"Course"},
    *   path="/api/courses",
    *   summary="Create a new Course",
    *   @OA\RequestBody(
    *     required=true,
    *     @OA\JsonContent(
    *
    *      ref="#/components/schemas/RequestCourseResource"
    *     )
    *   ),
    *   @OA\Response(response=201, description="OK", @OA\JsonContent(ref="#/components/schemas/CourseResource")),
    * )
    */
    public function store(Request $request){

       return $this->service->save($request);
    }

    /**
     * @OA\Get(
     *   tags={"Course"},
     *   path="/api/courses/{id}/students",
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
    public function seeEnrollmentStudents($id){

        return $this->service->enrollmentStudents($id);

    }

     /**
     * @OA\Get(
     *   tags={"Course"},
     *   path="/api/courses/{id}/detailed-report",
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
    public function detailReport($id){
        return $this->service->report($id);
    }


}
