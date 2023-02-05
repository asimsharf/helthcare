<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AvailableAppointmentCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function ($availableAppointments) {
                return $this->formatAvailableAppointments($availableAppointments);
            }),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }

    public static function formatAvailableAppointments($availableAppointments)
    {
        return [
            "id" => $availableAppointments->id,
			"doctor" => DoctorCollection::formatDoctor($availableAppointments->doctor),
			"from_time" => $availableAppointments->from_time,
			"to_time" => $availableAppointments->to_time,
			"date" => $availableAppointments->date,
			"is_reserved" => $availableAppointments->is_reserved,
			"created_at" => $availableAppointments->created_at,
			"updated_at" => $availableAppointments->updated_at,
        ];
    }
}
