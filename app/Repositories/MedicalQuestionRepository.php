<?php

namespace App\Repositories;

use App\Models\MedicalQuestion;
use App\Interfaces\MedicalQuestionInterface;
use App\Http\Resources\MedicalQuestionCollection;

class MedicalQuestionRepository implements MedicalQuestionInterface
{
    public function index()
    {
        try {
            return new MedicalQuestionCollection(MedicalQuestion::with(['patient'])->paginate(10));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function store($request)
    {
        try {
            $medicalQuestion = MedicalQuestion::create($request->all());
            return new MedicalQuestionCollection($medicalQuestion);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        try {
            return  MedicalQuestionCollection::formatMedicalQuestion(MedicalQuestion::with(['patient'])->findOrFail($id));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update($request, $id)
    {
        try {
            $medicalQuestion = MedicalQuestion::findOrFail($id);
            $medicalQuestion->update($request->all());
            return new MedicalQuestionCollection($medicalQuestion);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            $medicalQuestion = MedicalQuestion::findOrFail($id);
            $medicalQuestion->delete();
            return new MedicalQuestionCollection($medicalQuestion);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
