<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
class UpdateBlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string|min:10',
            'author' => 'nullable|string|max:100',
            'published_at' => 'nullable|date',
            'thumbnail' => 'nullable|image|max:2048',
        ];
    }
}
