<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'nullable|array',
            'name.en' => 'required|string|max:255',
            'name.zh' => 'nullable|string|max:255',
            'name.zh-Hant' => 'nullable|string|max:255',
            'address' => 'nullable|array',
            'address.en' => 'required|string|max:255',
            'address.zh' => 'nullable|string|max:255',
            'address.zh-Hant' => 'nullable|string|max:255',
            'phone' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }

    public function messages()
    {
        return [
            'name.en.required' => 'The English name is required.',
            'address.en.required' => 'The English address is required.',
        ];
    }
}
