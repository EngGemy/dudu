<?php

namespace App\Http\Requests;

use App\Enum\MessageTitle;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class MessageRequest extends FormRequest
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
            'title' => ['nullable', new Enum(MessageTitle::class)],
            'name' => ['required', 'string'],
            'city_id' => ['required', 'exists:cities,id'],
            'email' => ['required', 'email'],
            'phone' => ['nullable', 'numeric'],
            'code' => ['nullable', 'string'],
            'message' => ['required', 'string'],
        ];

        return $rules;
    }
}
