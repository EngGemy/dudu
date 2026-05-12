<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PopularVideoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'link' => ['required', 'max:10000'],
            'title' => ['nullable', 'array'],
            'title.en' => ['required', 'string', 'max:255'],
            'title.zh' => ['nullable', 'string', 'max:255'],
            'title.zh-Hant' => ['nullable', 'string', 'max:255'],
            'status' => ['nullable'],
        ];

        if ($this->method() == 'PUT') {
            $rules['link'] = ['sometimes', 'max:10000'];
            $rules['title'] = ['nullable', 'array'];
            $rules['title.en'] = ['required', 'string', 'max:255'];
            $rules['status'] = ['nullable'];
        }

        return $rules;
    }
}
