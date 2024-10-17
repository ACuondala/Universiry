<?php

namespace App\Resources\Enrollment;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *   schema="RequestEnrollmentResource",
 *   type="object",
 *   title="RequestEnrollment",
 *   description="Resource representing a Subject",
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
 *
 * )
 *
*/
class RequestEnrollmentResource extends JsonResource{
    public function toArray($request){
        return parent::toArray($request);
    }
}
