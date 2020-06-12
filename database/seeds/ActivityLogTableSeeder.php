<?php

use Illuminate\Database\Seeder;
use App\activityLog;

class ActivityLogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("TRUNCATE TABLE activity_logs RESTART IDENTITY CASCADE");
        // DB::table('activity_logs')->truncate();

        factory(\App\activityLog::class, 3)->create()->each(function($activityLog){

            // Seed para a relação com users
            $activityLog->users()->save()(factory(\App\User::class)->make());

            // Seed para a relação com notification
            $activityLog->notification()->save()(factory(\App\Notification::class)->make());

        });

        // DB::statement('SET foreign_key_checks = 1');
    }
}
