<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\System\UserNotifications;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function markRead(Request $request)
    {
        $note_id = $request->get('userNotificationId');
        $user_note = UserNotifications::find($note_id);
        $user_note->read_status = 1;
        $user_note->save();

        return response()->json(['success' => 'true']);
    }

    public function markAllRead()
    {
        $user_notes = UserNotifications::where('read_status', 0)->get();
        foreach($user_notes as $note) {
            $note->read_status = 1;
            $note->save();
        }
        return response()->json(['success' => 'true']);
    }

    public function getCount()
    {
        $count = Auth::user()->unreadNotifications->count();
        return response()->json(['count' => $count]);
    }

    public function loadNotifications()
    {
        $unreadNotification = Auth::user()->unreadNotifications;
        return view('layouts.notificationmodel', compact('unreadNotification'))->render();
    }

}