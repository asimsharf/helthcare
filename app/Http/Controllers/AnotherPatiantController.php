<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnotherPatiantRequest;
use App\Http\Requests\UpdateAnotherPatiantRequest;
use App\Interfaces\AnotherPatiantInterface;
use App\Models\AnotherPatiant;

class AnotherPatiantController extends Controller
{

    private AnotherPatiantInterface $anotherPatiantInterface;

    public function __construct(AnotherPatiantInterface $anotherPatiantInterface)
    {
        $this->anotherPatiantInterface = $anotherPatiantInterface;
    }

    public function index()
    {
        return $this->anotherPatiantInterface->index();
    }

    public function show($id)
    {
        return $this->anotherPatiantInterface->show($id);
    }

    public function store( $request)
    {
        return $this->anotherPatiantInterface->store($request);
    }

    public function update( $request, $id)
    {
        return $this->anotherPatiantInterface->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->anotherPatiantInterface->destroy($id);
    }

}
