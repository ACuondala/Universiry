<?php

namespace App\Resources\Grade;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *   schema="RequestGradeResource",
 *   type="object",
 *   title="RequestGrade",
 *   description="Resource representing a Grade",
 *    @OA\Property(
 *         property="student_id",
 *         type="integer",
 *         description="foreign key of student",
 *
 *   ),
 *   @OA\Property(
 *         property="subject_id",
 *         type="integer",
 *         description="foreign key of subject",
 *
 *   ),
 *   @OA\Property(
 *         property="grade",
 *         type="number",
 *         format="float",
 *         description="foreign key of subject",
 *
 *   ),
 *
 * )
 *
*/
class RequestGradeResource extends JsonResource{
    public function toArray($request){
        return parent::toArray($request);
    }
}
