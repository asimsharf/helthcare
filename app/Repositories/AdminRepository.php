<?php

namespace App\Repositories;

use App\Helpers\Helpers;
use App\Http\Resources\AdminCollection;
use App\Interfaces\AdminInterface;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminRepository implements AdminInterface
{
    public function register(Request $request)
    {
        try {
            $request->validate([
                'fname' => 'required|string|max:100',
                'lname' => 'required|string|max:100',
                'phone' => 'required|string|max:15',
                'email' => 'required|string|email|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'password' => 'required|string|min:8',
            ]);
            $admin = new Admin();
            $admin->fname = $request->fname;
            $admin->lname = $request->lname;
            $admin->phone = $request->phone;
            $admin->email = $request->email;
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $admin->image = $imageName;
            $admin->password = $request->password;
            $admin->is_active = 1;
            $admin->assignRole('admin');
            if ($admin->save()) {
                return Helpers::successResponse($admin, 'Admin Registered Successfully');
            } else {
                return Helpers::failedResponse('Admin Registration Failed');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function login($request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:8',
            ]);
            $admin = Admin::where('email', $request->email)->first();
            if ($admin) {
                if (Hash::check($request->password, $admin->password)) {
                    $token = $admin->createToken('auth_token')->plainTextToken;
                    return Helpers::successResponseWithToken($admin, $token, 'Admin Logged In Successfully');
                } else {
                    return Helpers::failedResponse('Admin Login Failed');
                }
            } else {
                return Helpers::failedResponse('Admin Login Failed');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function logout($request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
            return Helpers::successResponse(null, 'Admin Logged Out Successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function index()
    {
        try {
            if (auth()->user()->hasRole('super-admin')) {
                return new AdminCollection(Admin::paginate(10));
            } else {
                return Helpers::failedResponse('You are not authorized to perform this action', 401);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        try {

            if (auth()->user()->hasRole('super-admin')) {
                $admin = Admin::findOrfail($id);
                if ($admin) {
                    return Helpers::successResponse(AdminCollection::formatAdmin($admin), 'Admin Found');
                } else {
                    return Helpers::failedResponse('Admin Not Found');
                }
            } else {
                return Helpers::failedResponse('You are not authorized to perform this action', 401);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            if (auth()->user()->hasRole('super-admin')) {
                $request->validate([
                    'fname' => 'required|string|max:100',
                    'lname' => 'required|string|max:100',
                    'phone' => 'required|string|max:15',
                    'email' => 'required|string|email|max:255',
                    'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                    'password' => 'required|string|min:8',
                ]);
                $admin = Admin::find($id);
                if ($admin) {
                    $admin->fname = $request->fname;
                    $admin->lname = $request->lname;
                    $admin->phone = $request->phone;
                    $admin->email = $request->email;
                    $admin->password = $request->password;
                    $admin->is_active = 1;
                    if ($request->hasFile('image')) {
                        if ($admin->image != null) {
                            $oldImage = public_path('images') . '/' . $admin->image;
                            if (file_exists($oldImage) && $admin->image != 'default.png') {
                                @unlink($oldImage);
                            }
                        }
                        $image = $request->file('image');
                        $imageName = time() . '.' . $image->extension();
                        $image->move(public_path('images'), $imageName);
                        $admin->image = $imageName;
                    }
                    if ($admin->save()) {
                        return Helpers::successResponse($admin, 'Admin Updated Successfully');
                    } else {
                        return Helpers::failedResponse('Admin Update Failed');
                    }
                } else {
                    return Helpers::failedResponse('Admin Not Found');
                }
            } else {
                return Helpers::failedResponse('You are not authorized to perform this action', 401);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            if (auth()->user()->hasRole('super-admin')) {
                $admin = Admin::find($id);
                if ($admin) {
                    if ($admin->image != null) {
                        $oldImage = public_path('images') . '/' . $admin->image;
                        if (file_exists($oldImage) && $admin->image != 'default.png') {
                            @unlink($oldImage);
                        }
                    }
                    if ($admin->delete()) {
                        return Helpers::successResponse(null, 'Admin Deleted Successfully');
                    } else {
                        return Helpers::failedResponse('Admin Delete Failed');
                    }
                } else {
                    return Helpers::failedResponse('Admin Not Found');
                }
            } else {
                return Helpers::failedResponse('You are not authorized to perform this action', 401);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
