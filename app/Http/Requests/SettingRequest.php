<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'site_name' => ['nullable', 'array'],
            'site_name.en' => ['nullable', 'string', 'max:255'],
            'site_name.zh' => ['nullable', 'string', 'max:255'],
            'site_name.zh-Hant' => ['nullable', 'string', 'max:255'],
            'opening_words' => ['nullable', 'array'],
            'opening_words.*' => ['nullable', 'string'],
            'Tags' => ['nullable', 'array'],
            'Tags.*' => ['nullable', 'string'],
            'address' => ['nullable', 'array'],
            'address.*' => ['nullable', 'string', 'max:500'],
            'location' => ['nullable', 'array'],
            'location.*' => ['nullable', 'string'],
            'manager_phone' => ['nullable', 'string', 'min:2'],
            'email' => ['nullable', 'email'],
            'currency' => ['nullable', 'string'],
            'site_logo_header' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'site_logo_footer' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'site_logo_icon' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,ico'],
        ];
    }

    public function messages()
    {
        return [
            'site_name.min' => 'site name required',
            'manager_phone.min' => 'Phone required',
            'email.email' => 'Email not right',
        ];
    }
}
