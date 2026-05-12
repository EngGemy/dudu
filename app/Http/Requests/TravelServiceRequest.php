<?php

namespace App\Http\Requests;

use App\Enum\TravelServiceStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class TravelServiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'title' => 'nullable|array',
            'title.en' => 'required|string|max:255',
            'title.zh' => 'nullable|string|max:255',
            'title.zh-Hant' => 'nullable|string|max:255',
            'description' => 'nullable|array',
            'description.en' => 'required|string',
            'description.zh' => 'nullable|string',
            'description.zh-Hant' => 'nullable|string',
            'main_image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'icon' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'status' => ['required', new Enum(TravelServiceStatus::class)],
        ];

        if ($this->isMethod('PUT')) {
            $rules['description.en'] = 'sometimes|string';
            $rules['main_image'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'];
            $rules['icon'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'title.en.required' => 'The English title is required.',
            'description.en.required' => 'The English description is required.',
        ];
    }
}
