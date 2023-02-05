<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ConsultationCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function ($consultations) {
                return $this->formatConsultations($consultations);
            }),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }

    public static function formatConsultations($consultations)
    {
        return [
            'id' => $consultations->id,
            'appointment' => AppointmentCollection::formatAppointment($consultations->appointment),
            'diagnoes' => $consultations->diagnoes,
            'doctor_instructions' => $consultations->doctor_instructions,
            'number_diagnoes_session' => $consultations->number_diagnoes_session,
            'expire_date' => $consultations->expire_date,
            'created_at' => $consultations->created_at,
            'updated_at' => $consultations->updated_at,
        ];
    }
}
