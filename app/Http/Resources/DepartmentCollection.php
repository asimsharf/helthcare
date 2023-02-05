<?php

namespace App\Http\Resources;

use App\Models\Clinic;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DepartmentCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function ($department) {
                return $this->formatDepartment($department);
            }),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }

    public static function formatDepartment($department){
        return [
            'id' => $department->id,
            'name' => $department->name,
            'description' => $department->description,
            'clinic' => ClinicCollection::formatClinic($department->clinic),
            'doctors' => $department->doctors->transform(function ($doctor){
                return DoctorCollection::formatDoctor($doctor);
            }),
            "created_at"=>$department->created_at,
            "updated_at"=>$department->updated_at,
        ];
    }
}
