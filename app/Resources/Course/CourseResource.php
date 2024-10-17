<?php
namespace App\Resources\Course;
use Illuminate\Http\Resources\Json\JsonResource;



/**
 * @OA\Schema(
 *     schema="CourseResource",
 *     type="object",
 *     title="Course",
 *     description="Resource representing a Course",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID of the course"
 *     ),
 *     @OA\Property(
 *         property="title",
 *         type="string",
 *         description="Title of the course"
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         description="Description of the course"
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
class CourseResource extends JsonResource{

    public function toArray($request){
        return parent::toArray($request);
    }
}
