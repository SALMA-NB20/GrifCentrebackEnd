<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // GET /api/notifications
    public function index(Request $request)
    {
        $user = $request->user();
        $notifications = Notification::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'data' => $notifications,
            'message' => 'Notifications retrieved successfully'
        ]);
    }

    // GET /api/student/notifications/count
    public function count(Request $request)
    {
        $count = Notification::where('user_id', $request->user()->id)
            ->where('read', false)
            ->count();

        return response()->json([
            'count' => $count,
            'message' => 'Unread notifications count retrieved'
        ]);
    }
}