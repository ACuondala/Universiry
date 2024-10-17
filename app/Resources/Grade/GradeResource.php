<?php

namespace App\Resources\Grade;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *   schema="GradeResource",
 *   type="object",
 *   title="Grade",
 *   description="Resource representing a Grade",
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
class GradeResource extends JsonResource{
    public function toArray($request){
        return parent::toArray($request);
    }
}
