<?php

namespace App\Http\Controllers;

use App\Http\Resources\NotificationCollection;
use App\Http\Resources\NotificationResource;
use App\Models\Notification as Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request): NotificationCollection
    {
        $request->merge(['userToId' => $request->owner->id]);
        $request->merge(['status' => 'unread']);

        $result = Notification::filter($request->all())
            ->paginate($request->input('per_page', 10), ['*'], 'page', $request->input('page', 1));

        return new NotificationCollection($result);
    }

    public function update(Request $request, Notification $notification): NotificationResource
    {
        if ($request->has('status')) {
            $notification->status = $request->status;
        }

        if ($notification->save()) {
            return new NotificationResource($notification);
        } else {
            return response()->json(['message' => 'Error updating goal'], 500);
        }
    }
}
