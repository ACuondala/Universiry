<?php

namespace App\Resources\Subject;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *   schema="RequestSubjectResource",
 *   type="object",
 *   title="Subject",
 *   description="Resource representing a Subject",
 *   @OA\Property(
 *         property="title",
 *         type="string",
 *         description="Title of the subject"
 *   ),
 *   @OA\Property(
 *         property="description",
 *         type="string",
 *         description="Description of the subject"
 *   ),
 *   @OA\Property(
 *         property="course_id",
 *         type="integer",
 *         description="foreign key of course",
 *
 *   ),
 *   @OA\Property(
 *         property="teacher_id",
 *         type="integer",
 *         description="foreign key of teacher",
 *
 *   ),
 *
 * )
 *
*/
class RequestSubjectResource extends JsonResource{
    public function toArray($request){
        return parent::toArray($request);
    }
}

/*
@OA\Items(
 *           @OA\Property(property="id", type="integer")
 *         ),
*/
