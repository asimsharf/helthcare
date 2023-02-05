<?php

namespace App\Repositories;

use App\Http\Resources\AppointmentCollection;
use App\Interfaces\AppointmentInterface;
use App\Models\Appointment;

class AppointmentRepository implements AppointmentInterface
{

    public function rules()
    {
        return [
            'doctor_id' => 'required|integer',
            'patient_id' => 'required|integer',
            'type' => 'required|integer',
            'time' => 'required|date_format:H:i',
            'date' => 'required|date_format:Y-m-d',
            'number' => 'required|string',
            'duration' => 'required|integer',
            'reason' => 'required|string',
            'for_another_patient' => 'required|integer',
            'cancel' => 'required|integer',
            'reject' => 'required|integer',
        ];
    }

    public function index()
    {
        return new AppointmentCollection(Appointment::with(['doctor', 'patient',  'rating',])->paginate(10));
    }

    public function show($id)
    {
        $appointment = AppointmentCollection::formatAppointment(Appointment::findOrFail($id));
        return response()->json([
            'code' => 1,
            'data' => $appointment,
        ]);
    }

    public function store($request)
    {
        $appointment = new Appointment();

        $appointment->doctor_id = $request->doctor_id;
        $appointment->patient_id = $request->patient_id;
        $appointment->type = $request->type;
        $appointment->time = $request->time;
        $appointment->date = $request->date;
        $appointment->number = $request->number;
        $appointment->duration = $request->duration;
        $appointment->reason = $request->reason;
        $appointment->for_another_patient = $request->for_another_patient;
        $appointment->cancel = $request->cancel;
        $appointment->reject = $request->reject;
        $appointment->save();
        return response()->json([
            'code' => 1,
            'message' => 'Appointment created successfully',
            'data' => $appointment,
        ]);
    }

    public function update($request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update($request->all());
        return response()->json([
            'code' => 1,
            'message' => 'Appointment updated successfully',
            'data' => $appointment,
        ]);
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return response()->json([
            'code' => 1,
            'data' => $appointment,
        ]);
    }
}

// Observer: methods are called automatically by the Eloquent model events
// retrieve

// creating
// created

// updating
// updated

// saving
// saved

// deleting
// deleted

// restoring
// restored

// who we can implement observer in laravel
// 1- we can implement observer in model
// 2- we can implement observer in controller
// 3- we can implement observer in repository
