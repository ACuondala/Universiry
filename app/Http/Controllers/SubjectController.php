<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Subject;
use App\Services\SubjectService;
use Illuminate\Http\Request;

class SubjectController extends Controller
{

    private $service;

    public function __construct(SubjectService $service){
        $this->service=$service;
    }
    //

     /**
     * @OA\Get(
     *   tags={"Subject"},
     *   path="/api/subjects",
     *   summary="Show all subjects",
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(ref="#/components/schemas/SubjectResource")
     *   )
     *
     * )
     */
    public function index(){

        return $this->service->getAll();
    }

    /**
     * @OA\Post(
     *   tags={"Subject"},
     *   path="/api/subjects",
     *   summary="Create a new Subject",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(ref="#/components/schemas/RequestSubjectResource")
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="OK",
     *     @OA\JsonContent(ref="#/components/schemas/SubjectResource")
     *   ),
     *
     * )
     */
    public function store(Request $request){
        return $this->service->save($request);

    }

    /**
     * @OA\Get(
     *   tags={"Subject"},
     *   path="/api/subjects/{id}/average-grade",
     *
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
    public function seeAllStudentAverage($id){


        return $this->service->allStudentAverage($id);
    }
}
