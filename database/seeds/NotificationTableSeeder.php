<?php

use Illuminate\Database\Seeder;
use App\Notification;

class NotificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("TRUNCATE TABLE notifications RESTART IDENTITY CASCADE");

        factory(\App\Notification::class, 3)->create()->each(function($notification){

            // Seed para a relação com activityLogs
            $notification->activityLogs()->save()(factory(\App\ActivityLog::class)->make());

        });

        // DB::statement('SET foreign_key_checks = 1');
    }
}
