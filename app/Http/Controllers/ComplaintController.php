<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComplaintRequest;
use App\Http\Requests\UpdateComplaintRequest;
use App\Interfaces\ComplaintInterface;
use App\Models\Complaint;

class ComplaintController extends Controller
{

    private ComplaintInterface $complaintInterface;

    public function __construct(ComplaintInterface $complaintInterface)
    {
        $this->complaintInterface = $complaintInterface;
    }

    public function index()
    {
        return $this->complaintInterface->index();
    }

    public function store(StoreComplaintRequest $request)
    {
        return $this->complaintInterface->store($request);
    }

    public function show($id)
    {
        return $this->complaintInterface->show($id);
    }

    public function update(UpdateComplaintRequest $request, $id)
    {
        return $this->complaintInterface->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->complaintInterface->destroy($id);
    }

}
