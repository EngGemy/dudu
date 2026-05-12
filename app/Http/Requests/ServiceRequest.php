<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'title' => ['nullable', 'array'],
            'title.en' => ['required', 'string', 'max:255'],
            'title.zh' => ['nullable', 'string', 'max:255'],
            'title.zh-Hant' => ['nullable', 'string', 'max:255'],
            'slug' => ['nullable', 'array'],
            'slug.*' => ['nullable', 'string', 'max:255'],
            'icon' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'description' => ['nullable', 'array'],
            'description.en' => ['required', 'string'],
            'description.zh' => ['nullable', 'string'],
            'description.zh-Hant' => ['nullable', 'string'],
            'meta_title' => ['nullable', 'array'],
            'meta_title.*' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'array'],
            'meta_description.*' => ['nullable', 'string'],
        ];

        if ($this->method() == 'PUT') {
            $rules['title'] = ['nullable', 'array'];
            $rules['title.en'] = ['required', 'string', 'max:255'];
            $rules['slug'] = ['nullable', 'array'];
            $rules['slug.*'] = ['nullable', 'string', 'max:255'];
            $rules['description'] = ['nullable', 'array'];
            $rules['description.en'] = ['required', 'string'];
            $rules['icon'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'];
            $rules['meta_title'] = ['nullable', 'array'];
            $rules['meta_title.*'] = ['nullable', 'string', 'max:255'];
            $rules['meta_description'] = ['nullable', 'array'];
            $rules['meta_description.*'] = ['nullable', 'string'];
        }

        return $rules;
    }
}
