<?php

namespace App\Http\Controllers;

use App\Interfaces\UserInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserInterface $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function index()
    {
        return $this->userInterface->index();
    }

    public function show($id)
    {
        return $this->userInterface->show($id);
    }

    public function update(Request $request, $id)
    {
        return $this->userInterface->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->userInterface->destroy($id);
    }

    public function register(Request $request)
    {
        return $this->userInterface->register($request);
    }

    public function verify(Request $request)
    {
        return $this->userInterface->verify($request);
    }

    public function login(Request $request)
    {
        return $this->userInterface->login($request);
    }

    public function logout(Request $request)
    {
        return $this->userInterface->logout($request);
    }

    public function updatePatientProfile(Request $request)
    {
        return $this->userInterface->updatePatientProfile($request);
    }

    public function updatePassword(Request $request)
    {
        return $this->userInterface->updatePassword($request);
    }

    public function completePatientProfile(Request $request)
    {
        return $this->userInterface->completePatientProfile($request);
    }

    public function forgotPassword(Request $request)
    {
        return $this->userInterface->forgotPassword($request);
    }

    public function resetPassword(Request $request)
    {
        return $this->userInterface->resetPassword($request);
    }

    public function refresh(Request $request)
    {
        return $this->userInterface->refresh($request);
    }

    public function me(Request $request)
    {
        return $this->userInterface->me($request);
    }
}
