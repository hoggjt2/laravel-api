<?php

namespace App\Http\Resources;

use App\Http\Resources\InstitutionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentResource extends JsonResource
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
            'name' => $this->name,
            'institution_id' => $this->institution_id
        ];
    }
}
