<?php

namespace App\Repositories;

use App\Helpers\Helpers;
use App\Interfaces\RoleInterface;
use Spatie\Permission\Models\Role;

class RoleRepository implements RoleInterface
{
    public function index()
    {
        if (auth()->user()->hasRole('super-admin')) {
            return Helpers::successResponseWithPagination(Role::with('permissions')->paginate(10), 'Roles fetched successfully.');
        }
        return Helpers::failedResponse(null, 'You are not authorized to view roles.', 401);
    }

    public function store($request)
    {
        if (auth()->user()->hasRole('super-admin')) {
            $request->validate([
                'name' => 'required|string',
                'permissions' => 'required|array'
            ]);
            $role = Role::create([
                'name' => $request->name,
                'guard_name' => 'api',
            ]);
            $role->syncPermissions($request->permissions);
            return Helpers::successResponse($role, 'Role created successfully.');
        }
        return Helpers::failedResponse(null, 'You are not authorized to create role.', 401);
    }

    public function show($role)
    {
        if (auth()->user()->hasRole('super-admin')) {
            $data = Role::with('permissions')->findOrFail($role);
            return Helpers::successResponse($data, 'Role fetched successfully.');
        }
        return Helpers::failedResponse(null, 'You are not authorized to view this role.', 401);
    }

    public function update($request,  $role)
    {
        if (auth()->user()->hasRole('super-admin')) {
            $request->validate([
                'name' => 'required|string',
                'permissions' => 'required|array'
            ]);
            $role->update([
                'name' => $request->name,
                'guard_name' => 'api',
            ]);
            $role->syncPermissions($request->permissions);

            return Helpers::successResponse($role, 'Role updated successfully.');
        }
        return  Helpers::failedResponse(null, 'You are not authorized to update this role.', 401);
    }

    public function destroy($role)
    {
        if (auth()->user()->hasRole('super-admin')) {
            $role->delete();
            return Helpers::successResponse(null, 'Role deleted successfully.');
        }
        return Helpers::failedResponse(null, 'You are not authorized to delete this role.', 401);
    }
}
