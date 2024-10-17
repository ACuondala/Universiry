<?php

namespace App\Resources\Subject;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *   schema="SubjectResource",
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
 *         property="course",
 *         type="array",
 *         description="foreign key of course",
 *         @OA\Items(
 *            @OA\Property(property="id", type="integer")
 *         ),
 *   ),
 *   @OA\Property(
 *         property="teacher",
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
class SubjectResource extends JsonResource{
    public function toArray($request){
        return parent::toArray($request);
    }
}
