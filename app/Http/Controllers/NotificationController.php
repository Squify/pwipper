<?php


namespace App\Http\Controllers;


use App\Notification;
use App\Pweep;
use App\User;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $jsonNotifications = [];

        if (Auth::id()) {
            $notifications = Notification::where('receiver_id', Auth::id())
                ->orderBy('updated_at', 'DESC')
                ->get()
                ->all();

            foreach ($notifications as $notification) {
                $pweep = Pweep::where('id', $notification->pweep->id)->firstOrFail();

                if ($pweep->initial_author_id)
                    $initial_author = User::where('id', $pweep->initial_author_id)->first();

                array_push($jsonNotifications, [
                    'notification_id' => $notification->id,
                    'date' => $notification->created_at,
                    'pseudo' => $notification->initiator->pseudo,
                    'message' => $notification->type->message,
                    'is_read' => $notification->is_read,
                    'pweep_id' => $notification->pweep->id,
                    'pweep_author' => isset($initial_author) ? $initial_author->name : $pweep->author->name,
                    'pweep_message' => (substr($pweep->message, 0, 50) . '...'),
                ]);
            }
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

    public function readNotification(int $notifId)
    {
        $notification = Notification::where('id', $notifId)->first();
        if ($notification->is_read == false) {
            $notification->is_read = true;
            $notification->timestamps = false;
            $notification->save();
        }
    }
}
