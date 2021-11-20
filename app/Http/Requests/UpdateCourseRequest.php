<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'title' => 'string|regex:/^[a-zA-Z\s]*$/|max:255',
            'code' => 'string|regex:/^[a-zA-Z\s]*$/|max:255',
            'efts' => 'numeric',
            'points' => 'integer|min:1|max:360',
            'department_id' => 'exists:departments,id'
        ];
    }
}