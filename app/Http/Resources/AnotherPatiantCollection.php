<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AnotherPatiantCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function ($anotherPatiant) {
                return $this->formatAnotherPatiant($anotherPatiant);
            }),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }

    public static function formatAnotherPatiant($anotherPatiant){

        return [
            "id"=>$anotherPatiant->id,
            "appointment"=>AppointmentCollection::formatAppointment($anotherPatiant->appointment),
            "fname"=>$anotherPatiant->fname,
            "lname"=>$anotherPatiant->lname,
            "birth_date"=>$anotherPatiant->birth_date,
            "phone"=>$anotherPatiant->phone,
            "relative_relation"=>$anotherPatiant->relative_relation,
            "insurance_account"=>$anotherPatiant->insurance_account,
            "created_at"=>$anotherPatiant->created_at,
            "updated_at"=>$anotherPatiant->updated_at,
        ];

    }
}
