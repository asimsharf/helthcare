<?php

namespace App\Repositories;

use App\Http\Resources\AnotherPatiantCollection;
use App\Models\AnotherPatiant;
use App\Interfaces\AnotherPatiantInterface;

class AnotherPatiantRepository implements AnotherPatiantInterface
{

    public function index()
    {
        return new AnotherPatiantCollection(AnotherPatiant::with(['appointment'])->paginate(10));
    }

    public function show($id)
    {
        return AnotherPatiantCollection::formatAnotherPatiant(AnotherPatiant::find($id));
    }

    public function store($request)
    {
        return AnotherPatiant::create($request->all());
    }

    public function update($request, $id)
    {
        $anotherPatiant = AnotherPatiant::find($id);
        $anotherPatiant->update($request->all());
        return $anotherPatiant;
    }

    public function destroy($id)
    {
        $anotherPatiant = AnotherPatiant::find($id);
        $anotherPatiant->delete();
        return $anotherPatiant;
    }
}
