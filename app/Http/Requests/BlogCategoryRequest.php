<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'title' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'slug' => ['required', 'string'],
        ];

        // Additional rules for PUT method
        if ($this->method() == 'PUT') {
            $rules['title'] = ['sometimes', 'string'];
            $rules['slug'] = ['sometimes', 'string'];
            $rules['image'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'];
        }

        return $rules;
    }
}
