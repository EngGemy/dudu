<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialSettingRequest extends FormRequest
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
        return [
            'instagram' => ['nullable', 'string', 'max:500'],
            'facebook' => ['nullable', 'string', 'max:500'],
            'youtube' => ['nullable', 'string', 'max:500'],
            'tiktok' => ['nullable', 'string', 'max:500'],
            'douyin' => ['nullable', 'string', 'max:500'],
            'redbook' => ['nullable', 'string', 'max:500'],
            'wechat' => ['nullable', 'string', 'max:500'],
            'line' => ['nullable', 'string', 'max:500'],
            'twitter' => ['nullable', 'string', 'max:500'],
            'snap' => ['nullable', 'string', 'max:500'],
            'google_play' => ['nullable', 'string', 'max:500'],
            'app_store' => ['nullable', 'string', 'max:500'],
            'telegram' => ['nullable', 'string', 'max:500'],
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
