<?php

namespace App\Http\Resources;

use App\Http\Resources\InstitutionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'dob' => $this->dob,
            //'phone' => $this->phone,
            'email' => $this->email,
            'institution_id' => $this->institution_id
        ];
    }
}
