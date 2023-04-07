<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\ClinicInterface;

class ClinicController extends Controller
{
    private ClinicInterface $clinicInterface;

    public function __construct(ClinicInterface $clinicInterface)
    {
        $this->clinicInterface = $clinicInterface;
    }

    public function index()
    {
        return $this->clinicInterface->index();
    }

    public function show($id)
    {
        return $this->clinicInterface->show($id);
    }

    public function store(Request $request)
    {
        return $this->clinicInterface->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->clinicInterface->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->clinicInterface->destroy($id);
    }

}
