<?php

namespace App\Http\Controllers;

use App\Interfaces\CityInterface;
use Illuminate\Http\Request;

class CityController extends Controller
{

    private CityInterface $cityInterface;

    public function __construct(CityInterface $cityInterface)
    {
        $this->cityInterface = $cityInterface;
    }

    public function index()
    {
        return $this->cityInterface->index();
    }

    public function store(Request $request)
    {
        return $this->cityInterface->store($request);
    }

    public function show($id)
    {
        return $this->cityInterface->show($id);
    }

    public function update(Request $request, $id)
    {
        return $this->cityInterface->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->cityInterface->destroy($id);
    }
}
