<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInstitutionRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'name' => 'string|regex:/^[a-zA-Z\s]*$/|max:255',
            'region' => 'string|regex:/^[a-zA-Z\s]*$/|max:255',
            'country' => 'string|regex:/^[a-zA-Z\s]*$/|max:255'
        ];
    }
}