<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface AdminInterface
{
    public function register(Request $request);
    public function login($request);
    public function logout($request);
    public function index();
    public function show($id);
    public function update(Request $request, $id);
    public function destroy($id);
}
