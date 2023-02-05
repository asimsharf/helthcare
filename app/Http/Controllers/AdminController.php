<?php

namespace App\Http\Controllers;


use App\Interfaces\AdminInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    protected AdminInterface $adminInterface;

    public function __construct(AdminInterface $adminInterface)
    {
        $this->adminInterface = $adminInterface;
    }

    public function register(Request $request)
    {
        return $this->adminInterface->register($request);
    }

    public function login($request)
    {
        return $this->adminInterface->login($request);
    }

    public function logout($request)
    {
        return $this->adminInterface->logout($request);
    }

    public function index()
    {
        return $this->adminInterface->index();
    }

    public function show($id)
    {
        return $this->adminInterface->show($id);
    }

    public function update(Request $request, $id)
    {
        return $this->adminInterface->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->adminInterface->destroy($id);
    }
}
