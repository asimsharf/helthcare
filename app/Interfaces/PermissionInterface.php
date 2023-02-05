<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface PermissionInterface
{
    public function index();
    public function store($request);
    public function show($id);
    public function update($request, $id);
    public function destroy($id);
    public function assign(Request $request);
    public function revoke(Request $request);
}
