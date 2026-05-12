<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class User_DashboardRequest extends FormRequest
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
            'username' => 'min:2|unique:admins,username,'.$this->id,
            'role_id' => 'numeric|exists:roles,id',
            'email' => 'email|unique:admins,email,'.$this->id,
            'password' => 'nullable|confirmed|min:8',
        ];
    }

    public function messages()
    {
        return [
            'username.min' => 'ادخل اسم المستخدم',
            'username.unique' => 'اسم المستخدم موجود من قبل ',
            'email.min' => 'ادخل البريد الالكتروني',
            'email.email' => 'ادخل البريد الالكتروني بشكل صحيح',
            'email.unique' => 'البريد الالكتروني موجود من قبل ',
            'password.min' => 'ادخل كلمه المرور',
            'password.confirmed' => 'كلمه المرور غير متشابهه',
        ];
    }
}
