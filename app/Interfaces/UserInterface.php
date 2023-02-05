<?php

namespace App\Interfaces;

interface UserInterface
{
    public function index();
    public function show($id);
    public function update($request, $id);
    public function destroy($id);

    public function register($request);
    public function verify($request);
    public function login($request);
    public function logout($request);
    public function updatePatientProfile($request);
    public function updatePassword($request);
    public function completePatientProfile($request);
    public function forgotPassword($request);
    public function resetPassword($request);
    public function refresh($request);
    public function me($request);
}
