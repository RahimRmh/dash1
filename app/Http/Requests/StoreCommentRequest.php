<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
class StoreCommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

   

    public function rules()
    {
        return [
            'content' => 'required|string|max:255',
            'video_id' => 'required|exists:videos,id',
            'parent_id' => 'nullable|exists:comments,id',
        ];
    }
}
