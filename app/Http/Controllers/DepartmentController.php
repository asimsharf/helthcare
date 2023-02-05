<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\DepartmentInterface;

class DepartmentController extends Controller
{
    private DepartmentInterface $departmentInterface;

    public function __construct(DepartmentInterface $departmentInterface)
    {
        $this->departmentInterface = $departmentInterface;
    }

    public function index()
    {
        return $this->departmentInterface->index();
    }

    public function show($id)
    {
        return $this->departmentInterface->show($id);
    }

    public function store(Request $request)
    {
        return $this->departmentInterface->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->departmentInterface->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->departmentInterface->destroy($id);
    }

}
