<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface SuperAdminInterface
{
    public function register($request);
    public function login($request);
    public function logout($request);
    public function me($request);
    public function refresh($request);
}
