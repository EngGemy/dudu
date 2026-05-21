<?php

namespace App\Http\Requests;

use App\Enum\MessageTitle;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
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

    public function messages(): array
    {
        return [
            'name.required' => __('front.site.contact.validation.name_required'),
            'city_id.required' => __('front.site.contact.validation.city_required'),
            'city_id.exists' => __('front.site.contact.validation.city_exists'),
            'email.required' => __('front.site.contact.validation.email_required'),
            'email.email' => __('front.site.contact.validation.email_valid'),
            'message.required' => __('front.site.contact.validation.message_required'),
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        if ($this->expectsJson()) {
            throw new HttpResponseException(response()->json([
                'message' => $validator->errors()->first() ?: __('front.site.contact.validation_fallback'),
                'errors' => $validator->errors(),
            ], 422));
        }

        parent::failedValidation($validator);
    }
}
