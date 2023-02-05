<?php

namespace App\Repositories;

use App\Interfaces\ConsultationInterface;
use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Http\Resources\ConsultationCollection;

class ConsultationRepository implements ConsultationInterface
{
    public function index()
    {
        try {
            return new ConsultationCollection(Consultation::with(['appointment'])->paginate(10));
        } catch (\Exception $e) {
            return response()->json([
                'code' => 0,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function show($id)
    {
        try {
            return ConsultationCollection::formatConsultations(Consultation::with(['appointment'])->findOrfail($id));
        } catch (\Exception $e) {
            return response()->json([
                'code' => 0,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function store(Request $request)
    {
        $consultation = new Consultation();
        $consultation->patient_id = $request->patient_id;
        $consultation->doctor_id = $request->doctor_id;
        $consultation->date = $request->date;
        $consultation->start_time = $request->start_time;
        $consultation->end_time = $request->end_time;
        $consultation->is_active = $request->is_active;

        if ($consultation->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'Consultation Created Successfully',
                'data' => $consultation
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Consultation Creation Failed',
                'data' => null
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $consultation = Consultation::findOrfail($id);
        $consultation->patient_id = $request->patient_id;
        $consultation->doctor_id = $request->doctor_id;
        $consultation->date = $request->date;
        $consultation->start_time = $request->start_time;
        $consultation->end_time = $request->end_time;
        $consultation->is_active = $request->is_active;

        if ($consultation->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'Consultation Updated Successfully',
                'data' => $consultation
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Consultation Update Failed',
                'data' => null
            ]);
        }
    }

    public function destroy($id)
    {
        $consultation = Consultation::findOrfail($id);

        if ($consultation->delete()) {
            return response()->json([
                'status' => 200,
                'message' => 'Consultation Deleted Successfully',
                'data' => $consultation
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Consultation Deletion Failed',
                'data' => null
            ]);
        }
    }
}
