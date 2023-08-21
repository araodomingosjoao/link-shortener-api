<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLinkRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'original_url' => 'required|url',
            'slug' => 'nullable|unique:links',
        ];
    }
}
