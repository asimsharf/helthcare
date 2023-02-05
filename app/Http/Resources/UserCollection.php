<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\URL;

class UserCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function ($user) {
                return $this->formatUser($user);
            }),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }

    public static function formatUser($user)
    {
        return [
            "id" =>  $user->id,
            "fname" =>  $user->fname,
            "lname" =>  $user->lname,
            "username" =>  $user->username,
            "iqama" =>  $user->iqama,
            "phone" =>  $user->phone,
            "code" =>  $user->code,
            "other_phone" =>  $user->other_phone,
            "birth_date" =>  $user->birth_date,
            "gender" =>  $user->gender,
            "email" =>  $user->email,
            "image" =>  $user->image ? URL::to('/') . '/images/' . $user->image : URL::to('/images/default.jpeg'),
            "address" =>  $user->address,
            "is_active" =>  $user->is_active,
            "user_type" =>  $user->user_type,
            "created_at" => $user->created_at,
            "updated_at" => $user->updated_at,
        ];
    }

    public static function formatUserProfile($user)
    {
        return [
            "id" =>  $user->id,
            "fname" =>  $user->fname,
            "lname" =>  $user->lname,
            "username" =>  $user->username,
            "iqama" =>  $user->iqama,
            "phone" =>  $user->phone,
            "code" =>  $user->code,
            "other_phone" =>  $user->other_phone,
            "birth_date" =>  $user->birth_date,
            "gender" =>  $user->gender,
            "email" =>  $user->email,
            "image" =>  $user->image ? URL::to('/') . '/images/' . $user->image :  URL::to('/images/default.jpeg'),
            "address" =>  $user->address,
            "is_active" =>  $user->is_active,
            "profile" =>  $user->user_type == "doctor" ? DoctorCollection::formatDoctor($user->doctor)  : PatientCollection::formatPatient($user->patient),
            "created_at" => $user->created_at,
            "updated_at" => $user->updated_at,
        ];
    }
}
