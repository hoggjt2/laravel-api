<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            //'first_name' => 'required|string|regex:/^[a-zA-Z\s]*$/|max:255',
            //'last_name' => 'required|string|regex:/^[a-zA-Z\s]*$/|max:255',
            //'dob' => 'required|date|before:today',
            //'email' => 'required|string|unique:students,email',
            //'phone' => 'required|regex:/^02[0-9]{5,10}$/',
            //'institution_id' => 'required|exists:institutions,id'
        ];
    }
}