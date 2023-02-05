<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Interfaces\DoctorInterface;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    private DoctorInterface $doctorInterface;

    public function __construct(DoctorInterface $doctorInterface)
    {
        $this->doctorInterface = $doctorInterface;
    }

    public function index()
    {
        return $this->doctorInterface->index();
    }

    public function show($id)
    {
        return $this->doctorInterface->show($id);
    }

    public function store(StoreDoctorRequest $request)
    {
        return $this->doctorInterface->store($request);
    }

    public function update(UpdateDoctorRequest $request, $id)
    {
        return $this->doctorInterface->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->doctorInterface->destroy($id);
    }

    public function bestDoctor()
    {
        return $this->doctorInterface->bestDoctor();
    }

    public function departmentDoctors($department_id)
    {
        return $this->doctorInterface->departmentDoctors($department_id);
    }

    public function searchDoctors($name)
    {
        return $this->doctorInterface->searchDoctors($name);
    }

    public function filterDoctors(Request $request)
    {
        return $this->doctorInterface->filterDoctors($request);
    }

    public function favoriteDoctors(Request $request)
    {
        return $this->doctorInterface->favoriteDoctors($request);
    }

    public function patientFavoriteDoctors()
    {
        return $this->doctorInterface->patientFavoriteDoctors();
    }
}
