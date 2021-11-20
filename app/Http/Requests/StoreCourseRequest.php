<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'title' => 'required|string|regex:/^[a-zA-Z\s]*$/|max:255',
            'code' => 'required|string|regex:/^[a-zA-Z\s]*$/|max:255',
            'efts' => 'required|numeric',
            'points' => 'required|integer|min:1|max:360',
            'department_id' => 'required|exists:departments,id'
        ];
    }
}