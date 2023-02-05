<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PatientCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function ($patient) {
                return $this->formatPatientProfile($patient);
            }),
        ];
    }

    public static function formatPatient($patient)
    {
        return [
            'id' => $patient->id,
            'patient_number' => $patient->patient_number,
            'marital_status' => $patient->marital_status,
            'height' => $patient->height,
            'weight' => $patient->weight,
            'family_member_phone' => $patient->family_member_phone,
            'psychiatrist' => $patient->psychiatrist,
            'psychiatrist_description' => $patient->psychiatrist_description,
            'disability' => $patient->disability,
            'disability_description' => $patient->disability_description,
            'health_problem' => $patient->health_problem,
            'health_problem_description' => $patient->health_problem_description,
            'medication' => $patient->medication,
            'medication_description' => $patient->medication_description,
            'habits' => json_decode($patient->habits),
            'habits_other_details' => $patient->habits_other_details,
            'diseases' => $patient->diseases,
            'diseases_other_details' => $patient->diseases_other_details,
            'created_at' => $patient->created_at,
            'updated_at' => $patient->updated_at,
        ];
    }

    public static function formatPatientProfile($patient)
    {
        return [
            'id' => $patient->id,
            'patient_number' => $patient->patient_number,
            'marital_status' => $patient->marital_status,
            'height' => $patient->height,
            'weight' => $patient->weight,
            'family_member_phone' => $patient->family_member_phone,
            'psychiatrist' => $patient->psychiatrist,
            'psychiatrist_description' => $patient->psychiatrist_description,
            'disability' => $patient->disability,
            'disability_description' => $patient->disability_description,
            'health_problem' => $patient->health_problem,
            'health_problem_description' => $patient->health_problem_description,
            'medication' => $patient->medication,
            'medication_description' => $patient->medication_description,
            'habits' => json_decode($patient->habits),
            'habits_other_details' => $patient->habits_other_details,
            'diseases' => $patient->diseases,
            'diseases_other_details' => $patient->diseases_other_details,
            'patient' => UserCollection::formatUser($patient->user),
            'created_at' => $patient->created_at,
            'updated_at' => $patient->updated_at,
        ];
    }
}
