<?php

namespace App\Http\Requests;

use App\Enum\HearAboutUs;
use App\Enum\MessageTitle;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class JoinOurTeamRequest extends FormRequest
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
            'phone' => ['required', 'numeric'],
            'code' => ['nullable', 'string'],
            'message' => ['required', 'string'],
            'resume' => ['required'],
            'hear_about_us' => ['required', new Enum(HearAboutUs::class)],
        ];

        return $rules;
    }
}
