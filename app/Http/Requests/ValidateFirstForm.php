<?php

namespace App\Http\Requests;

use App\Enum\MessageTitle;
use App\Enum\Nationality;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rules\Enum;

class ValidateFirstForm extends FormRequest
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
            'name' => ['required', 'string', 'min:3'],

            'email' => ['required', 'email'],
            'phone' => ['nullable', 'numeric'],
            'code' => ['nullable', 'string'],

            'nationality' => ['nullable', new Enum(Nationality::class)],

        ];

        return $rules;
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 422)
        );
    }
}
