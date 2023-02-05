<?php

namespace App\Repositories;

use App\Helpers\Helpers;
use App\Http\Resources\PatientCollection;
use App\Interfaces\PatientInterface;
use App\Models\Patient;


class PatientRepository implements PatientInterface
{
    public function index()
    {
        return new PatientCollection(Patient::with(['user'])->paginate(10));
    }

    public function store($request)
    {
        $patient = new Patient;
        $patient->user_id = auth()->user()->id;
        $patient->patient_number = $request->patient_number;
        $patient->family_member_phone = $request->family_member_phone;
        $patient->patient_status = $request->patient_status;
        $patient->blood_type = $request->blood_type;
        $patient->height = $request->height;
        $patient->weight = $request->weight;
        $patient->blood_pressure = $request->blood_pressure;
        $patient->chronic_diseases = $request->chronic_diseases;
        $patient->previous_illnesses = $request->previous_illnesses;
        if ($patient->save()) {
            return Helpers::successResponse($patient, 'Patient created successfully');
        } else {
            return Helpers::failedResponse(null, 'Patient not created');
        }
    }

    public function show($id)
    {
        $patient = PatientCollection::formatPatientProfile(Patient::with(['user'])->findOrFail($id));
        return Helpers::successResponse($patient, 'Patient Details');
    }

    public function update($request, $id)
    {
        $patient = Patient::find($id);
        if (!$patient) {
            return response()->json(['code' => 0, 'message' => 'Patient not found'], 404);
        }
        $patient->patient_number = $request->patient_number;
        $patient->family_member_phone = $request->family_member_phone;
        $patient->patient_status = $request->patient_status;
        $patient->blood_type = $request->blood_type;
        $patient->height = $request->height;
        $patient->weight = $request->weight;
        $patient->blood_pressure = $request->blood_pressure;
        $patient->chronic_diseases = $request->chronic_diseases;
        $patient->previous_illnesses = $request->previous_illnesses;
        $patient->save();
        return response()->json(['code' => 1, 'message' => 'Patient updated successfully']);
    }

    public function destroy($id)
    {
        $patient = Patient::find($id);
        if (!$patient) {
            return response()->json(['code' => 0, 'message' => 'Patient not found'], 404);
        }
        $patient->delete();
        return response()->json(['code' => 1, 'message' => 'Patient deleted successfully']);
    }
}
