<?php

namespace App\Http\Resources;

use App\Http\Resources\DepartmentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'code' => $this->code,
            'efts' => $this->efts,
            'points' => $this->points,
            'department_id' => $this->department_id
        ];
    }
}
