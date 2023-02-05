<?php

namespace App\Repositories;

use App\Helpers\Helpers;
use Spatie\Permission\Models\Permission;
use App\Interfaces\PermissionInterface;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class PermissionRepository implements PermissionInterface
{
    public function index()
    {
        if (auth()->user()->hasRole('super-admin')) {
            return Helpers::successResponseWithPagination(Permission::with('roles')->paginate(10), 'Permissions fetched successfully.');
        }
        return Helpers::failedResponse(null, 'You are not authorized to view permissions.', 401);
    }

    public function store($request)
    {
        if (auth()->user()->hasRole('super-admin')) {
            $request->validate([
                'name' => 'required|string',
                'guard_name' => 'required|string',
            ]);
            $permission = Permission::create([
                'name' => $request->name,
                'guard_name' => $request->guard_name,
            ]);
            return Helpers::successResponse($permission, 'Permission created successfully.');
        }
        return Helpers::failedResponse(null, 'You are not authorized to create permission.', 401);
    }

    public function show($id)
    {
        if (auth()->user()->hasRole('super-admin')) {
            $permission = Permission::findOrFail($id);
            return Helpers::successResponse($permission, 'Permission fetched successfully.');
        }
        return Helpers::failedResponse(null, 'You are not authorized to view this permission.', 401);
    }

    public function update($request,  $permission)
    {
        if (auth()->user()->hasRole('super-admin')) {
            $request->validate([
                'name' => 'required|string',
                'guard_name' => 'required|string',
            ]);
            $permission->update([
                'name' => $request->name,
                'guard_name' => $request->guard_name,
            ]);
            return Helpers::successResponse($permission, 'Permission updated successfully.');
        }
        return Helpers::failedResponse(null, 'You are not authorized to update this permission.', 401);
    }

    public function destroy($permission)
    {
        if (auth()->user()->hasRole('super-admin')) {
            $permission->delete();
            return Helpers::successResponse(null, 'Permission deleted successfully.');
        }
        return Helpers::failedResponse(null, 'You are not authorized to delete this permission.', 401);
    }

    // assign permission to role
    public function assign(Request $request)
    {

        if (auth()->user()->hasRole('super-admin')) {
            $request->validate([
                'role' => 'required|string',
                'permission' => 'required|array',
            ]);
            $role = Role::where('name', $request->role)->first();


            $role->syncPermissions($request->permission);

            return Helpers::successResponse(null, 'Permission assigned successfully.');
        }
    }


    public function revoke(Request $request)
    {
        if (auth()->user()->hasRole('super-admin')) {
            $request->validate([
                'role' => 'required|string',
                'permission' => 'required|array',
            ]);
            $role = Role::where('name', $request->role)->first();
            $role->revokePermissionTo($request->permission);
            return Helpers::successResponse(null, 'Permission revoked successfully.');
        }
        return Helpers::failedResponse(null, 'You are not authorized to revoke permission.', 401);
    }
}
