<?php

namespace App\Http\Requests;

use App\Enum\BlogCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class BlogRequest extends FormRequest
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
            'title' => ['nullable', 'array'],
            'title.en' => ['required', 'string', 'max:255'],
            'title.zh' => ['nullable', 'string', 'max:255'],
            'title.zh-Hant' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'array'],
            'description.en' => ['required', 'string'],
            'description.zh' => ['nullable', 'string'],
            'description.zh-Hant' => ['nullable', 'string'],
            'head' => ['nullable', 'array'],
            'head.en' => ['required', 'string'],
            'head.zh' => ['nullable', 'string'],
            'head.zh-Hant' => ['nullable', 'string'],
            'meta_title' => ['nullable', 'array'],
            'meta_title.*' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'array'],
            'meta_description.*' => ['nullable', 'string'],
            'slug' => ['nullable', 'array'],
            'slug.*' => ['nullable', 'string', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'category' => ['required', new Enum(BlogCategory::class)],
            'subheaders' => ['required', 'min:1'],
        ];

        // Additional rules for PUT method
        if ($this->method() == 'PUT') {
            $rules['title'] = ['nullable', 'array'];
            $rules['title.en'] = ['required', 'string', 'max:255'];
            $rules['description'] = ['nullable', 'array'];
            $rules['description.en'] = ['required', 'string'];
            $rules['head'] = ['nullable', 'array'];
            $rules['head.en'] = ['required', 'string'];
            $rules['image'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'];
            $rules['category'] = ['sometimes', new Enum(BlogCategory::class)];
            $rules['subheaders'] = ['sometimes', 'min:1'];
            $rules['slug'] = ['nullable', 'array'];
            $rules['slug.*'] = ['nullable', 'string', 'max:255'];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'title.en.required' => 'The English title is required',
            'description.en.required' => 'The English description is required',
            'head.en.required' => 'The English head is required',
        ];
    }
}
