<?php

namespace App\Repositories;

use App\Http\Resources\CityCollection;
use App\Interfaces\CityInterface;
use App\Models\City;

class CityRepository implements CityInterface
{
    public function index()
    {
        return new CityCollection(City::paginate(10));
    }

    public function show($id)
    {
        $city = CityCollection::formatCity(City::findOrFail($id));
        return response()->json([
            'code' => 1,
            'data' => $city,
        ]);
    }

    public function store($request)
    {
        $city = City::create($request->all());
        return response()->json([
            'code' => 1,
            'data' => $city,
        ]);
    }

    public function update($request, $id)
    {
        $city = City::findOrFail($id);
        $city->update($request->all());

        return response()->json([
            'code' => 1,
            'data' => $city,
        ]);
    }

    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();

        return response()->json([
            'code' => 1,
            'data' => $city,
        ]);
    }
}
