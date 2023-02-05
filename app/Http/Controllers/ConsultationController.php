<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConsultationRequest;
use App\Http\Requests\UpdateConsultationRequest;
use App\Interfaces\ConsultationInterface;
use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{

    private ConsultationInterface $consultationInterface;

    public function __construct(ConsultationInterface $consultationInterface)
    {
        $this->consultationInterface = $consultationInterface;
    }

    public function index()
    {
        return $this->consultationInterface->index();
    }

    public function store(Request $request)
    {
        return $this->consultationInterface->store($request);
    }

    public function show($id)
    {
        return $this->consultationInterface->show($id);
    }

    public function update(Request $request, Consultation $consultation)
    {
        return $this->consultationInterface->update($request, $consultation);
    }

    public function destroy(Consultation $consultation)
    {
        return $this->consultationInterface->destroy($consultation);
    }

}
