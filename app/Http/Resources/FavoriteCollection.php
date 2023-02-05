<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FavoriteCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function ($favorite){
                return $this->formatFavorite($favorite);
            }),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }

    public static function formatFavorite($favorite)
    {
        return [
            'id' => $favorite->id,
            'doctor' => DoctorCollection::formatDoctor($favorite->doctor),
            'patient' => PatientCollection::formatPatient($favorite->patient),
            'created_at' => $favorite->created_at,
            'updated_at' => $favorite->updated_at,
        ];
    }
}
