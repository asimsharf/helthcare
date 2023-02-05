<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ComplaintCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function ($complaint) {
                return $this->formatComplaint($complaint);
            }),
        ];
    }

    public static function formatComplaint($complaint){
        return [
            'id' => $complaint->id,
            'admin' => AdminCollection::formatAdmin($complaint->admin),
            'user' => UserCollection::formatUser( $complaint->user),
            'super_admin' => SuperAdminCollection::formatSuperAdmin($complaint->super_admin),
            'date' => $complaint->date,
            'type' => $complaint->type,
            'title' => $complaint->title,
            'answer' => $complaint->answer,
            'message' => $complaint->message,
            'attach_file' => $complaint->attach_file,
            'description' => $complaint->description,
            "created_at"=>$complaint->created_at,
            "updated_at"=>$complaint->updated_at,

        ];
    }
}
