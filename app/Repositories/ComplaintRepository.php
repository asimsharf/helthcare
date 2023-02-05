<?php

namespace App\Repositories;

use App\Http\Resources\ComplaintCollection;
use App\Interfaces\ComplaintInterface;
use App\Models\Complaint;

class ComplaintRepository implements ComplaintInterface
{
    public function index()
    {
        return new ComplaintCollection(Complaint::paginate(10));
    }

    public function store($request)
    {
        $complaint = new Complaint;
        $complaint->user_id = auth()->user()->id;
        $complaint->title = $request->title;
        $complaint->description = $request->description;
        $complaint->save();
        return response()->json(['code'=>0,'message' => 'تم اضافة الشكوى بنجاح']);
    }

    public function show($id)
    {
        $complaint = ComplaintCollection::formatComplaint(Complaint::findOrFail($id));
        return response()->json([
            'code' => 1,
            'data' => $complaint,
        ]);
    }

    public function update($request, $id)
    {
        $complaint = Complaint::find($id);
        if (!$complaint) {
            return response()->json(['code'=>0,'message' => 'هذه الشكوى غير موجودة']);
        }
        $complaint->title = $request->title;
        $complaint->description = $request->description;
        $complaint->save();
        return response()->json(['code'=>0,'message' => 'تم تعديل الشكوى بنجاح']);
    }

    public function destroy($id)
    {
        $complaint = Complaint::find($id);
        if (!$complaint) {
            return response()->json(['code'=>0,'message' => 'هذه الشكوى غير موجودة']);
        }
        $complaint->delete();
        return response()->json(['code'=>0,'message' => 'تم حذف الشكوى بنجاح']);
    }
}
