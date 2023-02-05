<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CountryCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function ($country) {
                return $this->formatCountry($country);
            }),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }


    public static function formatCountry($country){
        return [
            'id' => $country->id,
            'name' => [
                'en' => $country->name,
                'ar' => $country->name,
            ],
            "created_at"=>$country->created_at,
            "updated_at"=>$country->updated_at,
        ];
    }
}
