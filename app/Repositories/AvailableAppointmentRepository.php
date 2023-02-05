<?php

namespace App\Repositories;

use App\Http\Resources\AvailableAppointmentCollection;
use App\Interfaces\AvailableAppointmentInterface;
use App\Models\AvailableAppointment;
use Illuminate\Http\Request;

class AvailableAppointmentRepository implements AvailableAppointmentInterface
{
    public function index()
    {
        try {
            return new AvailableAppointmentCollection(AvailableAppointment::with(['doctor'])->paginate(10));
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
            return AvailableAppointmentCollection::formatAvailableAppointments(AvailableAppointment::with(['doctor'])->findOrfail($id));
        } catch (\Exception $e) {
            return response()->json([
                'code' => 0,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function store(Request $request)
    {
        $availableAppointment = new AvailableAppointment();
        $availableAppointment->doctor_id = $request->doctor_id;
        $availableAppointment->date = $request->date;
        $availableAppointment->start_time = $request->start_time;
        $availableAppointment->end_time = $request->end_time;
        $availableAppointment->is_active = $request->is_active;

        if ($availableAppointment->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'Available Appointment Created Successfully',
                'data' => $availableAppointment
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Available Appointment Creation Failed',
                'data' => null
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $availableAppointment = AvailableAppointment::find($id);
        $availableAppointment->doctor_id = $request->doctor_id;
        $availableAppointment->date = $request->date;
        $availableAppointment->start_time = $request->start_time;
        $availableAppointment->end_time = $request->end_time;
        $availableAppointment->is_active = $request->is_active;

        if ($availableAppointment->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'Available Appointment Updated Successfully',
                'data' => $availableAppointment
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Available Appointment Updation Failed',
                'data' => null
            ]);
        }
    }

    public function destroy($id)
    {
        $availableAppointment = AvailableAppointment::find($id);
        if ($availableAppointment->delete()) {
            return response()->json([
                'status' => 200,
                'message' => 'Available Appointment Deleted Successfully',
                'data' => $availableAppointment
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Available Appointment Deletion Failed',
                'data' => null
            ]);
        }
    }
}
