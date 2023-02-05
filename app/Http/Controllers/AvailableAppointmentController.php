<?php

namespace App\Http\Controllers;

use App\Interfaces\AvailableAppointmentInterface;
use Illuminate\Http\Request;

class AvailableAppointmentController extends Controller
{

    private AvailableAppointmentInterface $availableAppointmentInterface;

    public function __construct(AvailableAppointmentInterface $availableAppointmentInterface)
    {
        $this->availableAppointmentInterface = $availableAppointmentInterface;
    }

    public function index()
    {
        return $this->availableAppointmentInterface->index();
    }

    public function show($id)
    {
        return $this->availableAppointmentInterface->show($id);
    }

    public function store(Request $request)
    {
        return $this->availableAppointmentInterface->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->availableAppointmentInterface->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->availableAppointmentInterface->destroy($id);
    }
    
}
