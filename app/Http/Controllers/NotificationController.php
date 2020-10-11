<?php


namespace App\Http\Controllers;


use App\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $jsonNotifications = [];
        $notifications = Notification::where('receiver_id', Auth::id())
            ->orderBy('updated_at', 'DESC')
            ->get()
            ->all();

        foreach ($notifications as $notification) {
            array_push($jsonNotifications, [
                'pseudo' => $notification->initiator->pseudo,
                'pweep_id' => $notification->pweep->id,
                'message' => $notification->type->message,
            ]);
        }

        return response()
            ->json(['notifications' => $jsonNotifications]);
    }
}
