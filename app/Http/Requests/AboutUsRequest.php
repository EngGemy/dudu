<?php

namespace App\Http\Requests;

use App\Enum\AboutUsStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class AboutUsRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'title' => ['required', 'array'],
            'title.en' => ['required', 'string'],
            'title.zh' => ['nullable', 'string'],
            'title.zh-Hant' => ['nullable', 'string'],
            'slug' => ['required', 'array'],
            'slug.en' => ['required', 'string'],
            'slug.zh' => ['nullable', 'string'],
            'slug.zh-Hant' => ['nullable', 'string'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'description' => ['required', 'array'],
            'description.en' => ['required', 'string'],
            'description.zh' => ['nullable', 'string'],
            'description.zh-Hant' => ['nullable', 'string'],
            'status' => ['required', new Enum(AboutUsStatus::class)],
        ];

        // Additional rules for PUT method
        if ($this->method() == 'PUT') {
            $rules['title'] = ['sometimes', 'array'];
            $rules['title.en'] = ['sometimes', 'string'];
            $rules['title.zh'] = ['nullable', 'string'];
            $rules['title.zh-Hant'] = ['nullable', 'string'];
            $rules['slug'] = ['sometimes', 'array'];
            $rules['slug.en'] = ['sometimes', 'string'];
            $rules['slug.zh'] = ['nullable', 'string'];
            $rules['slug.zh-Hant'] = ['nullable', 'string'];
            $rules['description'] = ['sometimes', 'array'];
            $rules['description.en'] = ['sometimes', 'string'];
            $rules['description.zh'] = ['nullable', 'string'];
            $rules['description.zh-Hant'] = ['nullable', 'string'];
            $rules['image'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'];
            $rules['status'] = ['sometimes', new Enum(AboutUsStatus::class)];
        }

        return $rules;
    }
}
