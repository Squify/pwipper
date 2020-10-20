<?php

use Illuminate\Database\Seeder;
use \App\NotificationType;

class NotificationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notificationTypes = [
            [1, 'Like', 'a liké votre pweep'],
            [2, 'Repweep', 'a repweepé votre pweep'],
            [3, 'Reply', 'a répondu à votre pweep'],
        ];

        foreach ($notificationTypes as $type) {
            NotificationType::create([
                'id' => $type[0],
                'name' => $type[1],
                'message' => $type[2],
            ]);

        }
    }
}
