<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
class StoreCourseRequest extends FormRequest
{
 
    public function authorize()
    {
        return true;
    }

   

  

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:10',
            'price' => 'required|numeric|min:0',
            'thumbnail' => 'required|image|max:2048',
        ];
    }


}
