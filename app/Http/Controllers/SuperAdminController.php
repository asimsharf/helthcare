<?php

namespace App\Http\Controllers;

use App\Interfaces\SuperAdminInterface;
use Illuminate\Http\Request;


class SuperAdminController extends Controller
{
    private SuperAdminInterface $superAdminInterface;

    public function __construct(SuperAdminInterface $superAdminInterface)
    {
        $this->superAdminInterface = $superAdminInterface;
    }

    public function register(Request $request)
    {
        return $this->superAdminInterface->register($request);
    }

    public function login(Request $request)
    {
        return $this->superAdminInterface->login($request);
    }

    public function me(Request $request)
    {
        return $this->superAdminInterface->me($request);
    }

    public function logout(Request $request)
    {
        return $this->superAdminInterface->logout($request);
    }

    public function refresh(Request $request)
    {
        return $this->superAdminInterface->refresh($request);
    }
}
