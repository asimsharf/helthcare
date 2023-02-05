<?php

namespace App\Repositories;

use App\Http\Resources\ClinicCollection;
use App\Interfaces\ClinicInterface;
use App\Models\Clinic;

class ClinicRepository implements ClinicInterface
{
    public function index()
    {
        return new ClinicCollection(Clinic::paginate(10));
    }

    public function show($id)
    {
        $clinic = ClinicCollection::formatClinic(Clinic::findOrFail($id));
        return response()->json([
            'code' => 1,
            'data' => $clinic,
        ]);
    }

    public function store($request)
    {
        $clinic = new Clinic();
        $clinic->name = $request->name;
        $clinic->description = $request->description;
        $clinic->save();
        return $clinic;
    }

    public function update($request, $id)
    {
        $clinic = Clinic::find($id);
        $clinic->name = $request->name;
        $clinic->description = $request->description;
        $clinic->save();
        return $clinic;
    }

    public function destroy($id)
    {
        $clinic = Clinic::find($id);
        $clinic->delete();
        return $clinic;
    }
}
