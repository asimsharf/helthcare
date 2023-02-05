<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\URL;

class AdminCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function ($admin) {
                return $this->formatAdmin($admin);
            }),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }

    public static function formatAdmin($admin){
        return [
            'id' => $admin->id,
            'fname' => $admin->fname,
            'lname' => $admin->lname,
            'phone' => $admin->phone,
            'email' => $admin->email,
            'image' => URL::to('images/'.$admin->image),
            'is_active' => $admin->is_active,
            'roles' => $admin->roles,
            'permissions' => $admin->permissions,
            "created_at"=>$admin->created_at,
            "updated_at"=>$admin->updated_at,
        ];
    }
}
