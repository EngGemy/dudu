<?php

namespace App\Http\Requests;

use App\Enum\MessageTitle;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
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

    public function messages()
    {
        return [
            'name.required' => __('front.site.contact.validation.name_required'),
            'city_id.required' => __('front.site.contact.validation.city_required'),
            'city_id.exists' => __('front.site.contact.validation.city_exists'),
            'email.required' => __('front.site.contact.validation.email_required'),
            'email.email' => __('front.site.contact.validation.email_valid'),
            'phone.numeric' => __('front.site.contact.validation.phone_numeric'),
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
