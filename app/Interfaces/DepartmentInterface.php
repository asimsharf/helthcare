<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface DepartmentInterface
{
    public function index();
    public function show($id);
    public function store($request);
    public function update($request, $id);
    public function destroy($id);
}
