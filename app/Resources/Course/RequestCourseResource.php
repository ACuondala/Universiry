<?php

namespace App\Resources\Course;

use Illuminate\Http\Resources\Json\JsonResource;


/**
 * @OA\Schema(
 *     schema="RequestCourseResource",
 *     type="object",
 *     title="Course",
 *     description="Resource representing a Course",
 *
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
 *
 * )
 */
class RequestCourseResource extends JsonResource{
    public function toArray($request){
        return parent::toArray($request);
    }
}
