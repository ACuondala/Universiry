<?php

namespace App\Resources\TeacherStudent;

use Illuminate\Http\Resources\Json\JsonResource;


/**
 * @OA\Schema(
 *     schema="RequestResource",
 *     type="object",
 *     title="Teacher or Students",
 *     description="Request representing a Teacher or Student",
 *
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="name of the teacher or student"
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         description="Email of the teacher or student"
 *     ),
 *
 * )
 */
class RequestResource extends JsonResource{
    public function toArray($request){
        return parent::toArray($request);
    }
}
