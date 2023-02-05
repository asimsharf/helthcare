<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\URL;

class DoctorCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function ($doctor) {
                return $this->formatDoctorProfile($doctor);
            }),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }


    public static function formatDoctor($doctor)
    {        
        return [
            'id' => $doctor->id,
            'experience_years' => $doctor->experience_years,
            "place_of_study" => $doctor->place_of_study,
            "image" =>  $doctor->image ? URL::to('/') . '/images/' . $doctor->image :  URL::to('/images/default.jpeg'),
            "certificates" => $doctor->certificates ? URL::to('/') . '/images/'. $doctor->certificates : URL::to('/images/certificates.png'),
            "social_media" => $doctor->social_media,
            "about_the_doctor" => $doctor->about_the_doctor,
            "rating_percentage" => $doctor->rating_percentage,
            "consultation_price" => $doctor->consultation_price,
            "skills" => $doctor->skills,
            "iqama" => $doctor->iqama,
            "work_experience" => $doctor->work_experience,
            "authority_card" => $doctor->authority_card ? URL::to('/') . '/images/'. $doctor->authority_card : URL::to('/images/authority_card.png'),
            "health_affairs_licensing" => $doctor->health_affairs_licensing ? URL::to('/') . '/images/'. $doctor->health_affairs_licensing : URL::to('/images/authority_card.png'),
            "is_favorite" => $doctor->isFavorite(),
            "is_verified" => $doctor->is_verified,
            "is_receiving_appointments" => $doctor->is_receiving_appointments,
            "created_at" => $doctor->created_at,
            "updated_at" => $doctor->updated_at,
        ];
    }

    public static function formatDoctorProfile($doctor)
    {
        return [
            'id' => $doctor->id,
            'experience_years' => $doctor->experience_years,
            "place_of_study" => $doctor->place_of_study,
            "image" =>  $doctor->image ? URL::to('/') . '/images/'. $doctor->image :  URL::to('/images/default.jpeg'),
            "certificates" => $doctor->certificates ? URL::to('/') . '/images/'. $doctor->certificates : URL::to('/images/certificates.png'),
            "social_media" => $doctor->social_media,
            "about_the_doctor" => $doctor->about_the_doctor,
            "rating_percentage" => $doctor->rating_percentage,
            "consultation_price" => $doctor->consultation_price,
            "skills" => $doctor->skills,
            "iqama" => $doctor->iqama,
            "work_experience" => $doctor->work_experience,
            "authority_card" => $doctor->authority_card ? URL::to('/') . '/images/'. $doctor->authority_card : URL::to('/images/authority_card.png'),
            "health_affairs_licensing" => $doctor->health_affairs_licensing ? URL::to('/') . '/images/'. $doctor->health_affairs_licensing : URL::to('/images/health_affairs_licensing.png'),
            "is_favorite" => $doctor->isFavorite(),
            "is_verified" => $doctor->is_verified,
            "is_receiving_appointments" => $doctor->is_receiving_appointments,
            'doctor' => UserCollection::formatUser($doctor->user),
            "ratings" => $doctor->ratings->transform(function ($rating) {
                return RatingsCollection::formatRatingDoctor($rating);
            }),
            "created_at" => $doctor->created_at,
            "updated_at" => $doctor->updated_at,
        ];
    }
}
