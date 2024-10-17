<?php

namespace App\Resources\Enrollment;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *   schema="EnrollmentResource",
 *   type="object",
 *   title="Enrollment",
 *   description="Resource representing a Enrollment",
 *   @OA\Property(
 *         property="id",
 *         type="integer",
 *
 *   ),
 *
 *   @OA\Property(
 *         property="Student",
 *         type="array",
 *         description="foreign key of course",
 *         @OA\Items(
 *            @OA\Property(property="id", type="integer")
 *         ),
 *   ),
 *   @OA\Property(
 *         property="Subject",
 *         type="array",
 *         description="foreign key of teacher",
 *         @OA\Items(
 *           @OA\Property(property="id", type="integer")
 *
 *         ),
 *   ),
 *
 * )
 *
*/
class EnrollmentResource extends JsonResource{
    public function toArray($request){
        return parent::toArray($request);
    }
}
