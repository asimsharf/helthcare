<?php

namespace App\Helpers;

use App\Models\Doctor;
use App\Models\Patient;

class Helpers
{
    static public function successResponse($data = null, $message = null, $code = 200)
    {
        return response()->json([
            'code' => 1,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    static public function successResponseWithToken($data = null, $token,  $message = null, $code = 200)
    {
        return response()->json([
            'code' => 1,
            'message' => $message,
            'data' => $data,
            'token' => $token
        ], $code);
    }

    static public function failedResponse($error = null, $message = null, $code = 400)
    {
        return response()->json([
            'code' => 0,
            'error' => $error,
            'message' => $message,
        ], $code);
    }

    static public function successResponseWithPagination($data = null, $message = null, $code = 200)
    {
        return response()->json([
            'code' => 1,
            'message' => $message,
            'data' => $data->items(),
            'pagination' => [
                'total' => $data->total(),
                'per_page' => $data->perPage(),
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage(),
                'from' => $data->firstItem(),
                'to' => $data->lastItem()
            ]
        ], $code);
    }

    static public function generatePatientNumber()
    {
        $patient = Patient::orderBy('id', 'desc')->first();
        if ($patient) {
            $patient_number = $patient->patient_number;
            $patient_number = explode('-', $patient_number);

            if ($patient_number[0] == 'P') {
                $patient_number = $patient_number[1] + 1;
            } else {
                $patient_number = $patient_number[0] + 1;
            }

            $patient_number = 'P-' . $patient_number;
        } else {
            $patient_number = 'P-1';
        }
        return $patient_number;
    }

    static public function generateDoctorNumber()
    {
        $doctor = Doctor::orderBy('id', 'desc')->first();
        if ($doctor) {
            $doctor_number = $doctor->doctor_number;
            $doctor_number = explode('-', $doctor_number);

            if ($doctor_number[0] == 'D') {
                $doctor_number = $doctor_number[1] + 1;
            } else {
                $doctor_number = $doctor_number[0] + 1;
            }

            $doctor_number = 'D-' . $doctor_number;
        } else {
            $doctor_number = 'D-1';
        }
        return $doctor_number;
    }

    static public function generateUsername($email)
    {
        $email = explode('@', $email);
        $rand = rand(1000, 9999);
        $username = $email[0] . $rand;
        return $username;
    }

    static public function generateOTP()
    {
        $otp = rand(1000, 9999);
        return $otp;
    }


    static public function filterMinMax($value)
    {
        $value = explode('-', $value);
        $value = [
            'min' => $value[0],
            'max' => $value[1]
        ];
        return $value;
    }
}
