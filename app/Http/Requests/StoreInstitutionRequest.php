<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInstitutionRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'name' => 'required|string|regex:/^[a-zA-Z\s]*$/|max:255',
            'region' => 'required|string|regex:/^[a-zA-Z\s]*$/|max:255',
            'country' => 'required|string|regex:/^[a-zA-Z\s]*$/|max:255'
        ];
    }
}