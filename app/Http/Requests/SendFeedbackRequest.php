<?php

namespace App\Http\Requests;

use App\Enum\MessageTitle;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class SendFeedbackRequest extends FormRequest
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
            'title' => ['nullable', new Enum(MessageTitle::class)],
            'name' => ['required', 'string'],
            'city_id' => ['required', 'exists:cities,id'],
            'email' => ['required', 'email'],
            'message' => ['required', 'string'],
        ];

        return $rules;
    }
}
