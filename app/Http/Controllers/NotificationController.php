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
                'pweep_link' => $notification->initiator->pseudo,
                'pseudo' => $notification->initiator->pseudo,
                'pweep_id' => $notification->pweep->id,
                'message' => $notification->type->message,
            ]);
        }

        return response()
            ->json(['notifications' => $jsonNotifications]);
    }

    public function createNotification(int $receiverId, int $initiatorId, int $pweepId, int $typeId)
    {
        Notification::insert([
            'receiver_id' => $receiverId,
            'initiator_id' => $initiatorId,
            'pweep_id' => $pweepId,
            'type_id' => $typeId,
            'is_read' => false,
        ]);
    }
}
