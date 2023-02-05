<?php

namespace App\Http\Controllers;

use App\Interfaces\PermissionInterface;
use Illuminate\Http\Request;


class PermissionController extends Controller
{
    private PermissionInterface $permissionInterface;

    public function __construct(PermissionInterface $permissionInterface)
    {
        $this->permissionInterface = $permissionInterface;
    }

    public function index()
    {
        return $this->permissionInterface->index();
    }

    public function store($request)
    {
        return $this->permissionInterface->store($request);
    }

    public function show($permission)
    {
        return $this->permissionInterface->show($permission);
    }

    public function update($request,  $permission)
    {
        return $this->permissionInterface->update($request, $permission);
    }

    public function destroy($permission)
    {
        return $this->permissionInterface->destroy($permission);
    }

    public function assign(Request $request)
    {
        return $this->permissionInterface->assign($request);
    }

    public function revoke(Request $request)
    {
        return $this->permissionInterface->revoke($request);
    }
}
