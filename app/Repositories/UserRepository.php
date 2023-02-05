<?php

namespace App\Repositories;

use App\Http\Resources\UserCollection;
use App\Interfaces\UserInterface;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Helpers;

class UserRepository implements UserInterface
{
    public function index()
    {
        return new  UserCollection(User::with(['doctor', 'patient'])->paginate(10));
    }

    public function show($id)
    {
        $data = UserCollection::formatUserProfile(User::with(['doctor', 'patient'])->findOrFail($id));
        return Helpers::successResponse($data, 'User retrieved successfully', 200);
    }

    public function update($request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        $data = UserCollection::formatUserProfile($user);

        return Helpers::successResponse($data, 'User updated successfully', 200);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->delete()) {
            return Helpers::successResponse($user, 'User deleted successfully', 200);
        } else {
            return Helpers::failedResponse('User deletion failed', 400);
        }
    }

    public function register($request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'iqama' => 'required|string|max:255|unique:users',
            'phone' => 'required|string|max:255|unique:users|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|string|min:8|same:password',
            'user_type' => 'required|string|max:255',
        ]);
        $user = new User();
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->iqama = $request->iqama;
        $user->phone = $request->phone;
        $user->password = $request->password;
        $user->confirm_password = $request->confirm_password;
        $user->user_type = $request->user_type;
        $user->code = Helpers::generateOTP();
        $user->fcm_token = $request->fcm_token;
        $user->assignRole($user->user_type);
        if ($user->save()) {
            if ($user->user_type == 'patient') {
                $patient = new Patient();
                $patient->user_id = $user->id;
                $patient->patient_number = Helpers::generatePatientNumber();
                $patient->save();
            } else if ($user->user_type == 'doctor') {
                $doctor = new Doctor();
                $doctor->user_id = $user->id;
                $doctor->save();
            }
            $token = $user->createToken($user->user_type, ['role:' . $user->user_type])->plainTextToken;

            return Helpers::successResponseWithToken($user, $token, $user->user_type . ' Registered Successfully', 200);
        } else {
            return Helpers::failedResponse('User Registration Failed', 400);
        }
    }

    public function verify($request)
    {
        $request->validate([
            'phone' => 'required|string|max:255|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
            'code' => 'required|string|max:255',
        ]);
        $user = User::where('phone', $request->phone)->first();
        if ($user) {
            if ($user->code == $request->code) {
                $user->is_active = 1;
                if ($user->save()) {
                    $token = $user->createToken($user->user_type, ['role:' . $user->user_type])->plainTextToken;
                    $data = UserCollection::formatUserProfile($user);
                    return Helpers::successResponseWithToken($data, $token, $user->user_type . ' Verified Successfully', 200);
                } else {
                    return Helpers::failedResponse('User Verification Failed', 400);
                }
            } else {
                return Helpers::failedResponse('Sorry the code is not correct', 400);
            }
        } else {
            return Helpers::failedResponse('There\s no user with this phone number', 400);
        }
    }

    public function login($request)
    {
        $request->validate([
            'phone' => 'required|string|max:255|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
            'password' => 'required|string|min:8',
        ]);
        $user = User::with(['city', 'doctor', 'patient'])->where('phone', $request->phone)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken($user->user_type, ['role:' . $user->user_type])->plainTextToken;
                $data = UserCollection::formatUserProfile($user);
                return Helpers::successResponseWithToken($data, $token, $user->user_type . ' Logged In Successfully', 200);
            } else {
                return Helpers::failedResponse('Sorry Password or Phone is not correct', 400);
            }
        } else {
            return Helpers::failedResponse('There\s no user with this phone number', 400);
        }
    }

    public function logout($request)
    {
        $request->user()->currentAccessToken()->delete();
        return Helpers::successResponse(null, 'User Logged Out Successfully', 200);
    }

    public function updatePatientProfile($request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'iqama' => 'required|string|max:255',
            'phone' => 'required|string|max:255|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
            'birth_date' => 'required|date',
            'gender' => 'required|string|max:255',
            "marital_status" => 'required|string|max:255',
        ]);
        $user = User::where('id', auth()->user()->id)->first();
        $patient = Patient::where('user_id', auth()->user()->id)->first();


        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->iqama = $request->iqama;
        $user->phone = $request->phone;
        $user->birth_date = $request->birth_date;
        $user->gender = $request->gender;

        if ($request->hasFile('image')) {
            if ($user->image != null) {
                $oldImage = public_path('images') . '/' . $user->image;
                if (file_exists($oldImage) && $user->image != 'default.png') {
                    @unlink($oldImage);
                }
            }
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $user->image = $name;
        }

        if ($user->update()) {
            $patient->marital_status = $request->marital_status;
            if ($patient->update()) {
                $data = UserCollection::formatUserProfile($user);
                return Helpers::successResponse($data, 'Patient Profile Updated Successfully', 200);
            } else {
                return Helpers::failedResponse('Patient Profile Update Failed', 400);
            }
        } else {
            return Helpers::failedResponse('Patient Profile Update Failed', 400);
        }
    }

    public function updatePassword($request)
    {
        $request->validate([
            'old_password' => 'required|string|min:8',
            'new_password' => 'required|string|min:8',
            'confirm_password' => 'required|string|min:8|same:new_password',
        ]);
        $user = User::findOrFail(auth()->user()->id);
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = $request->new_password;
            $user->confirm_password = $request->confirm_password;
            if ($user->save()) {
                return Helpers::successResponse(null, 'Password Changed Successfully', 200);
            } else {
                return Helpers::failedResponse('Password Change Failed', 400);
            }
        } else {
            return Helpers::failedResponse('Sorry Password is not correct', 400);
        }
    }

    public function completePatientProfile($request)
    {
        $request->validate([
            'birth_date' => 'required|date',
            'gender' => 'required|string',
            'marital_status' => 'required|string',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'family_member_phone' => 'required|string|max:255|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
            'psychiatrist' => 'numeric',
            'psychiatrist_description' => 'string',
            'disability' => 'numeric',
            'disability_description' => 'string',
            'health_problem' => 'numeric',
            'health_problem_description' => 'string',
            'medication' => 'numeric',
            'medication_description' => 'string',
            'habits' => 'array',
            'habits_other_details' => 'string',
            'diseases' => 'numeric',
            'diseases_other_details' => 'string',
        ]);

        $user = User::findOrFail(auth()->user()->id);
        $user->username = Helpers::generateUsername($request->email);
        $user->birth_date = $request->birth_date;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->other_phone = $request->other_phone;
        if ($user->save()) {
            $patient =  Patient::where('user_id', auth()->user()->id)->first();
            $patient->user_id = auth()->user()->id;
            $patient->marital_status = $request->marital_status;
            $patient->weight = $request->weight;
            $patient->height = $request->height;
            $patient->family_member_phone = $request->family_member_phone;
            $patient->psychiatrist = $request->psychiatrist;
            $patient->psychiatrist_description = $request->psychiatrist_description;
            $patient->disability = $request->disability;
            $patient->disability_description = $request->disability_description;
            $patient->health_problem = $request->health_problem;
            $patient->health_problem_description = $request->health_problem_description;
            $patient->medication = $request->medication;
            $patient->medication_description = $request->medication_description;
            $patient->habits = $request->habits;
            $patient->habits_other_details = $request->habits_other_details;
            $patient->diseases = $request->diseases;
            $patient->diseases_other_details = $request->diseases_other_details;
            $data = UserCollection::formatUserProfile($user);
            if ($patient->save()) {
                return Helpers::successResponse($data, 'Patient Profile Completed Successfully', 200);
            } else {
                return Helpers::failedResponse('Patient Profile Complete Failed', 400);
            }
        } else {
            return Helpers::failedResponse('Patient Profile Complete Failed', 400);
        }
    }

    public function forgotPassword($request)
    {
        $request->validate([
            'phone' => 'required|string',
        ]);
        $user = User::where('phone', $request->phone)->first();
        if ($user) {
            $code = Helpers::generateOTP();
            $user->code = $code;
            if ($user->save()) {
                $data = UserCollection::formatUserProfile($user);
                $token = $user->createToken($user->user_type, ['role:' . $user->user_type])->plainTextToken;
                return Helpers::successResponseWithToken($data, $token, 'OTP Sent Successfully', 200);
            } else {
                return Helpers::failedResponse('OTP Sent Failed', 400);
            }
        } else {
            return Helpers::failedResponse('User Not Found', 400);
        }
    }

    public function resetPassword($request)
    {
        $request->validate([
            'phone' => 'required|string',
            'code' => 'required|string',
            'new_password' => 'required|string|min:8',
            'confirm_password' => 'required|string|min:8|same:new_password',
        ]);

        $user = User::where('phone', $request->phone)->first();
        if ($user) {
            if ($user->code == $request->code) {
                $user->password = $request->new_password;
                $user->confirm_password = $request->confirm_password;
                if ($user->save()) {
                    return Helpers::successResponse(null, 'Password Reset Successfully', 200);
                } else {
                    return Helpers::failedResponse('Password Reset Failed', 400);
                }
            } else {
                return Helpers::failedResponse('OTP is not correct', 400);
            }
        } else {
            return Helpers::failedResponse('User Not Found', 400);
        }
    }

    public function refresh($request)
    {
        $user = User::findOrFail(auth()->user()->id);
        if ($user) {
            $data = UserCollection::formatUserProfile($user);
            $token = $user->createToken($user->user_type, ['role:' . $user->user_type])->plainTextToken;
            return Helpers::successResponseWithToken($data, $token, 'Token Refreshed Successfully', 200);
        } else {
            return Helpers::failedResponse('Token Refresh Failed', 400);
        }
    }

    public function me($request)
    {
        $user = User::with(['patient'])->findOrFail(auth()->user()->id);
        if ($user) {
            $data = UserCollection::formatUserProfile($user);
            return Helpers::successResponse($data, 'Patient Profile', 200);
        } else {
            return Helpers::failedResponse('Patient Profile Not Found', 400);
        }
    }
}
