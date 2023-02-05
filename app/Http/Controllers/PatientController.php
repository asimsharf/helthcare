<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Interfaces\PatientInterface;
use App\Models\Patient;

class PatientController extends Controller
{
    private PatientInterface $patientRepository;

    public function __construct(PatientInterface $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    public function index()
    {
        return $this->patientRepository->index();
    }

    public function store(StorePatientRequest $request)
    {
        return $this->patientRepository->store($request);
    }

    public function show($id)
    {
        return $this->patientRepository->show($id);
    }

    public function update(UpdatePatientRequest $request, $id)
    {
        return $this->patientRepository->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->patientRepository->destroy($id);
    }

}
