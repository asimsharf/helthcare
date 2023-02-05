<?php

namespace App\Repositories;

use App\Http\Resources\DepartmentCollection;
use App\Interfaces\DepartmentInterface;
use App\Models\Department;

class DepartmentRepository implements DepartmentInterface
{
    public function getDoctorDepartments($doctor_id)
    {
        $departments = Department::whereHas('doctors', function ($query) use ($doctor_id) {
            $query->where('doctor_id', $doctor_id);
        })->get();
        return new DepartmentCollection($departments);
    }

    public function index()
    {
        return new DepartmentCollection(Department::paginate(10));
    }

    public function show($id)
    {
        $department = DepartmentCollection::formatDepartment(Department::findOrFail($id));
        return response()->json([
            'code' => 1,
            'data' => $department,
        ]);
    }

    public function store($request)
    {
        $department = new Department();
        $department->name = $request->name;
        $department->description = $request->description;
        $department->save();
        return $department;
    }

    public function update($request, $id)
    {
        $department = Department::find($id);
        $department->name = $request->name;
        $department->description = $request->description;
        $department->save();
        return $department;
    }

    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();
        return $department;
    }
}
