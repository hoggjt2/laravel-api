<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'first_name' => 'string|regex:/^[a-zA-Z\s]*$/|max:255',
            'last_name' => 'string|regex:/^[a-zA-Z\s]*$/|max:255',
            'dob' => 'date|before:today',
            'email' => 'string|unique:students,email',
            'phone' => 'regex:/^02[0-9]{5,10}$/',
            'institution_id' => 'exists:institutions,id'
        ];
    }
}