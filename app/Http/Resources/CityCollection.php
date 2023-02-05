<?php

namespace App\Http\Resources;

use App\Models\Country;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CityCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function ($city) {
                return $this->formatCity($city);
            }),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }


    public static function formatCity($city){
        return [
            'id' => $city->id,
            'name' => [
                'ar' => $city->name,
                'en' => $city->name,
            ],
            'country' => CountryCollection::formatCountry($city->country),
            "created_at"=>$city->created_at,
            "updated_at"=>$city->updated_at,
        ];
    }
}
