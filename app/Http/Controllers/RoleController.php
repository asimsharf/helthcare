<?php

namespace App\Http\Controllers;

use App\Interfaces\RoleInterface;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    private RoleInterface $roleInterface;

    public function __construct(RoleInterface $roleInterface)
    {
        $this->roleInterface = $roleInterface;
    }

    public function index()
    {
        return $this->roleInterface->index();
    }

    public function store(Request $request)
    {
        return $this->roleInterface->store($request);
    }

    public function show(Role $role)
    {
        return $this->roleInterface->show($role);
    }

    public function update(Request $request, Role $role)
    {
        return $this->roleInterface->update($request, $role);
    }

    public function destroy(Role $role)
    {
        return $this->roleInterface->destroy($role);
    }

}
