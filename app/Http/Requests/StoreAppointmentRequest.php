<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'doctor_id' => 'required|integer',
            'patient_id' => 'required|integer',
            'type' => 'required|string',
            'time' => 'required|date_format:H:i',
            'date' => 'required|date_format:Y-m-d',
            'number' => 'required|string',
            'duration' => 'required|integer',
            'reason' => 'required|string',
            'for_another_patient' => 'required|integer',
            'cancel' => 'required|integer',
            'reject' => 'required|integer',
        ];
    }
}
