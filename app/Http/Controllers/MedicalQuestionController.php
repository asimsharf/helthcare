<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicalQuestionRequest;
use App\Http\Requests\UpdateMedicalQuestionRequest;
use App\Interfaces\MedicalQuestionInterface;
use App\Models\MedicalQuestion;
use Illuminate\Http\Request;

class MedicalQuestionController extends Controller
{
    private MedicalQuestionInterface $medicalQuestionInterface;

    public function __construct(MedicalQuestionInterface $medicalQuestionInterface)
    {
        $this->medicalQuestionInterface = $medicalQuestionInterface;
    }

    public function index()
    {
        return $this->medicalQuestionInterface->index();
    }

    public function store(Request $request)
    {
        return $this->medicalQuestionInterface->store($request);
    }

    public function show($id)
    {
        return $this->medicalQuestionInterface->show($id);
    }

    public function update(Request $request, $id)
    {
        return $this->medicalQuestionInterface->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->medicalQuestionInterface->destroy($id);
    }

}
