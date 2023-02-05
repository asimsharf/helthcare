<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SuperAdminCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function ($superAdmin) {
                return $this->formatSuperAdmin($superAdmin);
            }),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }


    public static function formatSuperAdmin($superAdmin){
        return [
            'id' => $superAdmin->id,
            'fname' => $superAdmin->fname,
            'lname' => $superAdmin->lname,
            'email' => $superAdmin->email,
            'image' => $superAdmin->image,
            'is_active' => $superAdmin->is_active,
            'role' => $superAdmin->roles,
            'permissions' => $superAdmin->permissions,
            "created_at"=>$superAdmin->created_at,
            "updated_at"=>$superAdmin->updated_at,
        ];
    }
}
