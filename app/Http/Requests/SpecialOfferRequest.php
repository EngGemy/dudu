<?php

namespace App\Http\Requests;

use App\Enum\SpecialOfferStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class SpecialOfferRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'title' => ['nullable', 'array'],
            'title.en' => ['required', 'string', 'max:255'],
            'title.zh' => ['nullable', 'string', 'max:255'],
            'title.zh-Hant' => ['nullable', 'string', 'max:255'],
            'slug' => ['nullable', 'array'],
            'slug.*' => ['nullable', 'string', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'description' => ['nullable', 'array'],
            'description.en' => ['required', 'string'],
            'description.zh' => ['nullable', 'string'],
            'description.zh-Hant' => ['nullable', 'string'],
            'status' => ['required', new Enum(SpecialOfferStatus::class)],
        ];

        if ($this->method() == 'PUT') {
            $rules['title'] = ['nullable', 'array'];
            $rules['title.en'] = ['required', 'string', 'max:255'];
            $rules['slug'] = ['nullable', 'array'];
            $rules['slug.*'] = ['nullable', 'string', 'max:255'];
            $rules['description'] = ['nullable', 'array'];
            $rules['description.en'] = ['required', 'string'];
            $rules['image'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'];
            $rules['status'] = ['sometimes', new Enum(SpecialOfferStatus::class)];
        }

        return $rules;
    }
}
