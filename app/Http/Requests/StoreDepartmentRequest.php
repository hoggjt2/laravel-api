<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepartmentRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'name' => 'required|string|unique:departments,name|regex:/^[a-zA-Z\s]*$/|max:255',
            'institution_id' => 'required|exists:institutions,id'
        ];
    }
}