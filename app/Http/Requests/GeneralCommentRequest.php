<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneralCommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'username' => ['nullable', 'array'],
            'username.en' => ['required', 'string', 'max:255'],
            'username.zh' => ['nullable', 'string', 'max:255'],
            'username.zh-Hant' => ['nullable', 'string', 'max:255'],
            'comment' => ['nullable', 'array'],
            'comment.en' => ['required', 'string'],
            'comment.zh' => ['nullable', 'string'],
            'comment.zh-Hant' => ['nullable', 'string'],
            'date' => ['required'],
            'rate' => ['required'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
        ];

        if ($this->method() == 'PUT') {
            $rules['username'] = ['nullable', 'array'];
            $rules['username.en'] = ['required', 'string', 'max:255'];
            $rules['comment'] = ['nullable', 'array'];
            $rules['comment.en'] = ['required', 'string'];
            $rules['date'] = ['sometimes'];
            $rules['rate'] = ['sometimes'];
            $rules['photo'] = ['sometimes', 'image', 'mimes:jpeg,png,jpg,gif,svg'];
        }

        return $rules;
    }
}
