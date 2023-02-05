<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RatingsCollection extends ResourceCollection
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
            'code'=> 1,
            'data' => $this->collection->transform(function ($rating) {
                return $this->formatRating($rating);
            }),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }

    public static function formatRating($rating){
        return [
            'id' => $rating->id,
            'note' => $rating->note,
            'amount' => $rating->amount,
            'date' => $rating->date,
            'appointment' => AppointmentCollection::formatAppointment($rating->appointment),
            'profile' => PatientCollection::formatPatientProfile($rating->patient),
            'doctor' => DoctorCollection::formatDoctor($rating->doctor),
            "created_at"=>$rating->created_at,
            "updated_at"=>$rating->updated_at,
        ];
    }

    public static function formatRatingDoctor($rating){
        return [
            'id' => $rating->id,
            'note' => $rating->note,
            'amount' => $rating->amount,
            'date' => $rating->date,
            'profile' => PatientCollection::formatPatientProfile($rating->patient),
            "created_at"=>$rating->created_at,
            "updated_at"=>$rating->updated_at,
        ];
    }
}
