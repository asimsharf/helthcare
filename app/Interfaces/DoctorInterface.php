<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface DoctorInterface
{
    public function index();
    public function show($id);
    public function store($request);
    public function update($request, $id);
    public function destroy($id);
    public function bestDoctor();
    public function departmentDoctors($department_id);
    public function searchDoctors($name);
    public function filterDoctors(Request $request);
    public function favoriteDoctors($request);
    public function patientFavoriteDoctors();
}
