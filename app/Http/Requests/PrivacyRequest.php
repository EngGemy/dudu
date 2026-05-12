<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrivacyRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'description' => ['required', 'string'],

        ];

        // Additional rules for PUT method
        if ($this->method() == 'PUT') {
            $rules['title'] = ['sometimes', 'string'];
            $rules['slug'] = ['sometimes', 'string'];
            $rules['description'] = ['sometimes', 'string'];

        }

        return $rules;
    }
}
