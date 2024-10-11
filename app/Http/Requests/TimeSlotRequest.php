<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class TimeSlotRequest extends FormRequest
{
    
    protected function failedValidation(Validator $validator)
{
    throw new ValidationException($validator, response()->redirectToRoute('agenda.create')->withInput()->withErrors($validator)->with('error', 'Er is iets misgegaan. Probeer het opnieuw.'));
}

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    
    public function rules()
{
    return [
        'date' => ['required', 'date', 'after_or_equal:today'], // Date must be today or later
        'start_time' => ['required', 'date_format:H:i'],
        'end_time' => ['required', 'date_format:H:i', 'after:start_time'], // End time must be after start time
    ];
}
}

