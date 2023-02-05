<?php

namespace App\Repositories;

use App\Http\Resources\NotificationCollection;
use App\Interfaces\NotificationInterface;
use App\Models\Notification;

class NotificationRepository implements NotificationInterface
{
    public function index()
    {
        return new NotificationCollection(Notification::paginate(10));
    }

    public function store($request)
    {
        $notification = new Notification;
        $notification->title = $request->title;
        $notification->body = $request->body;
        $notification->save();
        return response()->json(['code'=>1,'message' => 'Notification created successfully']);
    }

    public function show($id)
    {
        $notification = NotificationCollection::formatNotification(Notification::findOrFail($id));
        return response()->json([
            'code' => 1,
            'data' => $notification,
        ]);
    }

    public function update($request, $id)
    {
        $notification = Notification::find($id);
        if (!$notification) {
            return response()->json(['code'=>0,'message' => 'This notification not found']);
        }
        $notification->title = $request->title;
        $notification->body = $request->body;
        $notification->save();
        return response()->json(['code'=>1,'message' => ' Notification updated successfully']);
    }

    public function destroy($id)
    {
        $notification = Notification::find($id);
        if (!$notification) {
            return response()->json(['code'=>0,'message' => 'This notification not found']);
        }
        $notification->delete();
        return response()->json(['code'=>1,'message' => 'Notification deleted successfully']);
    }
}
