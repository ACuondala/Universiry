<?php

namespace App\Resources\TeacherStudent;

use Illuminate\Http\Resources\Json\JsonResource;


/**
 * @OA\Schema(
 *     schema="Resource",
 *     type="object",
 *     title="Teacher or Student",
 *     description="Resource representing a Teacher or Student",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID of the teacher or student"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="name of the teacher or student"
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         description="Email of the teacher or student "
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         description="Creation timestamp"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         description="Update timestamp"
 *     )
 * )
 */
class Resource extends JsonResource{
    public function toArray($request){
        return parent::toArray($request);
    }
}
