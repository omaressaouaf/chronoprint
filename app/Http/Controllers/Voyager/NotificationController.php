<?php

namespace App\Http\Controllers\Voyager;

use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function deleteNotifications()
    {
        /** @var \App\Models\User */
        $authUser = auth()->user();
        $authUser->notifications()->delete();
        
        return response()->json([
            'message' => 'notification(s) deleted successfully'
        ]);
    }

    public function markNotifications()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return response()->json([
            'message' => 'notification(s) updated successfully'
        ]);
    }
}
