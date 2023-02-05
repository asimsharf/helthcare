<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface RoleInterface
{
    public function index();
    public function store($request);
    public function show($role);
    public function update($request,  $role);
    public function destroy($role);
}
