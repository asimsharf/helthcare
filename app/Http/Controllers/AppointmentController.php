<?php

namespace App\Http\Controllers;

use App\Interfaces\AppointmentInterface;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    private AppointmentInterface $appointmentRepository;

    public function __construct(AppointmentInterface $appointmentRepository)
    {
        $this->appointmentRepository = $appointmentRepository;
    }

    public function index()
    {
        return $this->appointmentRepository->index();
    }

    public function show($id)
    {
        return $this->appointmentRepository->show($id);
    }

    public function store(Request $request)
    {
        return $this->appointmentRepository->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->appointmentRepository->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->appointmentRepository->destroy($id);
    }

}
