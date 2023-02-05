<?php

namespace App\Repositories;

use App\Http\Resources\CountryCollection;
use App\Interfaces\CountryInterface;
use App\Models\Country;

class CountryRepository implements CountryInterface
{
    public function index()
    {
        return new CountryCollection(Country::paginate(10));
    }

    public function store($request)
    {
        $country = Country::create($request->all());
        return response()->json($country, 201);
    }

    public function show($id)
    {
        $country = CountryCollection::formatCountry(Country::findOrFail($id));
        return response()->json([
            'code' => 1,
            'data' => $country,
        ]);
    }

    public function update($request, $id)
    {
        $country = Country::findOrFail($id);
        $country->update($request->all());
        return response()->json($country, 200);
    }

    public function destroy($id)
    {
        Country::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
