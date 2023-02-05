<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ClinicCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function ($clinic) {
                return $this->formatClinic($clinic);
            }),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }

    public static function formatClinic($clinic){
        return [
            'id' => $clinic->id,
            'name' => [
                'en' => $clinic->name,
                'ar' => $clinic->name,
            ],
            'description' => [
                'en' => $clinic->description,
                'ar' => $clinic->description,
            ],
            'departments' => $clinic->departments->collect(function ($department) {
                return DepartmentCollection::formatDepartment($department);
            }),
            "created_at"=>$clinic->created_at,
            "updated_at"=>$clinic->updated_at,
        ];
    }
}
