<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
class UpdateCourseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

  

    public function rules()
    {
        return [
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string|min:10',
            'thumbnail' => 'nullable|image|max:2048', 
            'price' => 'sometimes|numeric|min:0',
            
        ];
    }
}
