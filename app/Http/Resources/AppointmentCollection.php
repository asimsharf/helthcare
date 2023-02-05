<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AppointmentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'code' => 1,
            'data' => $this->collection->transform(function ($appointment) {
                return $this->formatAppointment($appointment);
            }),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }

    public static function formatAppointment($appointment){
        return [
            'id' => $appointment->id,
            'doctor' => DoctorCollection::formatDoctor($appointment->doctor),
            'patient' => PatientCollection::formatPatient($appointment->patient),
            'type' => $appointment->type,
            'time' => $appointment->time,
            'date' => $appointment->date,
            'status' => $appointment->status,
            'number' => $appointment->number,
            'duration' => $appointment->duration,
            'reason' => $appointment->reason,
            'for_another_patient' => $appointment->for_another_patient,
            'cancel' => $appointment->cancel,
            'reject' => $appointment->reject,
            'rating' => $appointment->rating,
            'another_patients' => $appointment->another_patients,
            "created_at"=>$appointment->created_at,
            "updated_at"=>$appointment->updated_at,
        ];
    }
}
