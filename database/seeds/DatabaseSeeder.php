<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(PweepSeeder::class);
         $this->call(UserSeeder::class);
         $this->call(NotificationTypeSeeder::class);
         $this->call(NotificationSeeder::class);
    }
}
