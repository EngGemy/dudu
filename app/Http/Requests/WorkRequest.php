<?php

namespace App\Http\Requests;

use App\Enum\WorkStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class WorkRequest extends FormRequest
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
            'title' => ['nullable', 'string'],
            'slug' => ['nullable', 'string'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'description' => ['required', 'string'],
            'status' => ['required', new Enum(WorkStatus::class)],
        ];

        // Additional rules for PUT method
        if ($this->method() == 'PUT') {
            $rules['title'] = ['nullable', 'string'];
            $rules['slug'] = ['nullable', 'string'];
            $rules['description'] = ['sometimes', 'string'];
            $rules['image'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'];
            $rules['status'] = ['sometimes', new Enum(WorkStatus::class)];

        }

        return $rules;
    }
}
