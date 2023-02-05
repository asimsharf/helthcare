<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class NotificationCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function ($notification) {
                return $this->formatNotification($notification);
            }),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }

    public static function formatNotification($notification){
        return [
            'id' => $notification->id,
            'user' => UserCollection::formatUser($notification->user),
            'date' => $notification->date,
            'time' => $notification->time,
            'title' => $notification->title,
            'description' => $notification->description,
            'user_type' => $notification->user_type,
            'created_at' => $notification->created_at,
            'updated_at' => $notification->updated_at,
        ];
    }
}
