<?php

namespace App\Http\Requests;

use App\Enum\AgeRang;
use App\Enum\MessageTitle;
use App\Enum\Nationality;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class BookingRequest extends FormRequest
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
            'city_id' => ['nullable', 'exists:cities,id'],
            'tour_id' => ['required', 'exists:tours,id'],
            'email' => ['required', 'email'],
            'phone' => ['nullable', 'numeric'],
            'code' => ['nullable', 'string'],
            'adt' => ['nullable', 'numeric'],
            'chd' => ['nullable', 'numeric'],
            'arrival_date' => ['required'],
            'departure_date' => ['required'],
            'range_age' => ['nullable', new Enum(AgeRang::class)],
            // 'nationality' => ["nullable",new Enum(Nationality::class)],
            'notes' => ['nullable', 'string'],

        ];

        return $rules;
    }
}
