<?php

namespace App\Http\Controllers;


use App\Models\Subject;
use App\Models\Teacher;
use App\Services\TeacherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    private $service;

    public function __construct(TeacherService $service){
        $this->service=$service;
    }
    //
     /**
     * @OA\Get(
     *   tags={"Teacher"},
     *   path="/api/teachers",
     *   summary="Show all Teachers",
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
     *   tags={"Teacher"},
     *   path="/api/teachers",
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
     *   tags={"Teacher"},
     *   path="/api/teachers/{id}/subjects",
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
    public function seeTeacherSubjects($id){

       return $this->service->teacherSubjects($id);
    }
}
