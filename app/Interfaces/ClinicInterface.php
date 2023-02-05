<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface ClinicInterface
{
    public function index();
    public function show($id);
    public function store($request);
    public function update($request, $id);
    public function destroy($id);
}
