<?php

namespace App\Repositories;

use App\Http\Resources\SuperAdminCollection;
use App\Interfaces\SuperAdminInterface;
use App\Models\SuperAdmin;
use Illuminate\Support\Facades\Hash;

class SuperAdminRepository implements SuperAdminInterface
{
    public function register($request)
    {
        if (auth()->user()->hasRole('super-admin')) {
            $request->validate([
                'fname' => 'required|string|max:255',
                'lname' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'password' => 'required|string|min:8',
            ]);

            $superAdmin = new SuperAdmin();

            $superAdmin->fname = $request->fname;
            $superAdmin->lname = $request->lname;
            $superAdmin->email = $request->email;
            $superAdmin->image = "image.png";
            $superAdmin->password = $request->password;
            $superAdmin->is_active = 1;

            $superAdmin->assignRole('super-admin');

            if ($superAdmin->save()) {
                return response()->json([
                    'code' => 1,
                    'message' => 'Super Admin Login Successfully',
                    'data' => SuperAdminCollection::formatSuperAdmin($superAdmin),
                ]);
            } else {
                return response()->json([
                    'code' => 0,
                    'message' => 'Super Admin Registration Failed',
                    'data' => null
                ]);
            }
        } else {
            return response()->json(['code' => 0, 'message' => 'You are not authorized to perform this action'], 401);
        }
    }

    public function login($request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        $superAdmin = SuperAdmin::where('email', $request->email)->first();

        if ($superAdmin) {
            if (Hash::check($request->password, $superAdmin->password)) {
                $token = $superAdmin->createToken('super-admin', ['role:super-admin']);

                return response()->json([
                    'code' => 1,
                    'message' => 'Super Admin Login Successfully',
                    'data' => SuperAdminCollection::formatSuperAdmin($superAdmin),
                    'token' => $token->plainTextToken,
                ]);
            } else {
                return response()->json([
                    'code' => 0,
                    'message' => 'Super Admin Login Failed',
                    'data' => null
                ]);
            }
        } else {
            return response()->json([
                'code' => 0,
                'message' => 'Super Admin with this email does not exist',
                'data' => null
            ]);
        }
    }

    public function me($request)
    {
        if (auth()->user()->hasRole('super-admin')) {
            return response()->json([
                'code' => 1,
                'message' => 'Super Admin Details',
                'data' => SuperAdminCollection::formatSuperAdmin($request->user()),
            ]);
        } else {
            return response()->json(['code' => 0, 'message' => 'You are not authorized to perform this action'], 401);
        }
    }

    public function logout($request)
    {
        if (auth()->user()->hasRole('super-admin')) {
            $request->user()->tokens()->delete();
            return response()->json([
                'code' => 1,
                'message' => 'Super Admin Logout Successfully',
                'data' => null,
            ]);
        } else {
            return response()->json(['code' => 0, 'message' => 'You are not authorized to perform this action'], 401);
        }
    }

    public function refresh($request)
    {
        if (auth()->user()->hasRole('super-admin')) {
            $request->user()->tokens()->delete();
            $token = $request->user()->createToken('super-admin', ['role:super-admin']);
            return response()->json([
                'code' => 1,
                'message' => 'Super Admin Refresh Token Successfully',
                'data' => SuperAdminCollection::formatSuperAdmin($request->user()),
                'token' => $token->plainTextToken,
            ]);
        } else {
            return response()->json(['code' => 0, 'message' => 'You are not authorized to perform this action'], 401);
        }
    }
}
