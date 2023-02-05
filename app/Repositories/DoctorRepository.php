<?php

namespace App\Repositories;

use App\Helpers\Helpers;
use App\Http\Resources\DoctorCollection;
use App\Interfaces\DoctorInterface;
use App\Models\Doctor;
use App\Models\Favorite;
use App\Models\Patient;
use GuzzleHttp\Psr7\Uri;
use Illuminate\Http\File;
use Illuminate\Support\Facades\URL;

class DoctorRepository implements DoctorInterface
{

    public function index()
    {
        return new DoctorCollection(Doctor::with(['user', 'clinics', 'department', 'ratings', 'patients'])->paginate(10));
    }

    public function show($id)
    {
        $doctor = DoctorCollection::formatDoctorProfile(Doctor::with(['user', 'clinics', 'department', 'ratings', 'patients'])->findOrFail($id));

        return Helpers::successResponse($doctor, 'Doctor Details');
    }

    public function store($request)
    {
        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->description = $request->description;
        $doctor->save();
        return $doctor;
    }

    public function update($request, $id)
    {
        $doctor = Doctor::find($id);
        $doctor->name = $request->name;
        $doctor->description = $request->description;
        $doctor->save();
        return $doctor;
    }

    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();
        return $doctor;
    }

    public function bestDoctor()
    {
        $doctor = Doctor::with(['user', 'clinics', 'department', 'ratings', 'patients'])
            ->where('is_receiving_appointments', 1)
            ->where('is_verified', 1)
            ->orderBy('experience_years', 'desc')
            ->orderBy('rating_percentage', 'desc')
            ->paginate(10);

        return new DoctorCollection($doctor);
    }


    public function departmentDoctors($department_id)
    {
        if ($department_id == 0) {
            $doctor = Doctor::with(['user', 'clinics', 'department', 'ratings', 'patients'])
                ->where('is_receiving_appointments', 1)
                ->where('is_verified', 1)
                ->paginate(10);
        } else {
            $doctor = Doctor::with(['user', 'clinics', 'department', 'ratings', 'patients'])
                ->where('is_receiving_appointments', 1)
                ->where('is_verified', 1)
                ->where('department_id', $department_id)
                ->paginate(10);
        }
        return new DoctorCollection($doctor);
    }

    public function searchDoctors($name)
    {
        $doctor = Doctor::with(['user', 'clinics', 'department', 'ratings', 'patients'])
            ->where('is_receiving_appointments', 1)
            ->where('is_verified', 1)
            ->whereHas('user', function ($query) use ($name) {
                $query->where('fname', 'like', '%' . $name . '%');
                $query->orWhere('lname', 'like', '%' . $name . '%');
                $query->orWhere('username', 'like', '%' . $name . '%');
            })
            ->paginate(10);

        return new DoctorCollection($doctor);
    }

    public function filterDoctors($request)
    {

        $doctor = Doctor::with(['user', 'clinics', 'department', 'ratings', 'patients'])
            ->where('consultation_price', '>=', Helpers::filterMinMax($request->consultation_price)['min'])
            ->where('consultation_price', '<=', Helpers::filterMinMax($request->consultation_price)['max'])
            ->where('experience_years', '>=', Helpers::filterMinMax($request->experience_years)['min'])
            ->where('experience_years', '<=', Helpers::filterMinMax($request->experience_years)['max'])
            ->whereHas('clinics', function ($query) use ($request) {
                $query->whereIn('clinic_id', $request->clinic_id);
            })
            ->whereHas('ratings', function ($query) use ($request) {
                $query->where('rating_percentage', '>=', $request->rating_percentage);
            })
            ->whereHas('user', function ($query) use ($request) {
                $query->whereIn('gender', $request->gender);
            })
            ->paginate(10);

        return new DoctorCollection($doctor);
    }

    public function favoriteDoctors($request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id|integer',
        ]);

        if (auth()->user()->user_type != 'patient') {
            return Helpers::failedResponse(null, 'Sorry, only patients can add doctors to favorite');
        } else {
            $favorite = new Favorite();
            $patient_id = Patient::where('user_id', auth()->user()->id)->first()->id;
            $check = Favorite::where('patient_id', $patient_id)->where('doctor_id', $request->doctor_id)->first();

            $favorite->patient_id = $patient_id;
            $favorite->doctor_id = $request->doctor_id;
            if ($check) {
                if ($check->delete()) {
                    return Helpers::successResponse($check, 'Doctor removed from favorite successfully');
                } else {
                    return Helpers::failedResponse(null,  'Error removing doctor from favorite');
                }
            } else {
                if ($favorite->save()) {
                    return Helpers::successResponse($favorite, 'Doctor added to favorite successfully');
                } else {
                    return Helpers::failedResponse(null,  'Error adding doctor to favorite');
                }
            }
        }
    }

    public function patientFavoriteDoctors()
    {
        $patient_id = Patient::where('user_id', auth()->user()->id)->first()->id;
        $favorite = Doctor::with(['user', 'clinics', 'department', 'ratings', 'patients'])
            ->whereHas('favorites', function ($query) use ($patient_id) {
                $query->where('patient_id', $patient_id);
            })
            ->paginate(10);
        return new DoctorCollection($favorite);
    }
}
