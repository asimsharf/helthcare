<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MedicalQuestionCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function ($medicalQuestion) {
                return $this->formatMedicalQuestion($medicalQuestion);
            }),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }

    public static function formatMedicalQuestion($medicalQuestion)
    {
        return [
            'id' => $medicalQuestion->id,
            'patient' => PatientCollection::formatPatient($medicalQuestion->patient),
            'text' => $medicalQuestion->text,
            'answer' => $medicalQuestion->answer,
            'created_at' => $medicalQuestion->created_at,
            'updated_at' => $medicalQuestion->updated_at,
        ];
    }
}
