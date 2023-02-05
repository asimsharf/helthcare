<?php

namespace App\Http\Controllers;

use App\Interfaces\NotificationInterface;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    private NotificationInterface $notificationInterface;

    public function __construct(NotificationInterface $notificationInterface)
    {
        $this->notificationInterface = $notificationInterface;
    }

    public function index()
    {
        return $this->notificationInterface->index();
    }

    public function store(Request $request)
    {
        return $this->notificationInterface->store($request);
    }

    public function show($id)
    {
        return $this->notificationInterface->show($id);
    }

    public function update(Request $request, $id)
    {
        return $this->notificationInterface->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->notificationInterface->destroy($id);
    }

}
