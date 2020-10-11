<?php

use App\Notification;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notifications = [
            [1, 2, 1, 1, false],
            [1, 2, 1, 2, false],
            [1, 2, 2, 1, true],
            [2, 2, 3, 1, false],
        ];

        foreach ($notifications as $notification) {
            Notification::create([
                'receiver_id' => $notification[0],
                'initiator_id' => $notification[1],
                'pweep_id' => $notification[2],
                'type_id' => $notification[3],
                'is_read' => $notification[4],
            ]);

        }
    }
}
