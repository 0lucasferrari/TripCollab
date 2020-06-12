<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("TRUNCATE TABLE users RESTART IDENTITY CASCADE");

        factory(\App\User::class, 100)->create();

        // ->each(function($user) {

        //     // Seed para a relação com 3 trips
        //     // Checar!!! $user->trips()->saveMany(factory(App\Trip::class, 3)->make());

        //     // Seed para a relação com 1 tripsAdmin
        //     $user->tripsAdmin()->save(factory(App\Trip::class)->make());

        //     //Seed para a relação com 3 groups
        //     $user->groups()->saveMany(factory(App\Group::class, 3)->make());

        //     //Seed para a relação com 1 groupsAdmin
        //     $user->groupsAdmin()->save(factory(App\Group::class)->make());

        //     //Seed para a relação com 4 interests
        //     $user->interests()->saveMany(factory(App\Interest::class, 4)->make());

        //     //Seed para a relação com 1 achievements
        //     $user->achievements()->save(factory(App\Achievement::class)->make());

        //     //Seed para a relação com 5 message
        //     $user->message()->saveMany(factory(App\Message::class, 5)->make());

        //     //Seed para a relação com User
        //     $user->User()->save(factory(App\User::class)->make());

        //     //Seed para a relação com 3 topics
        //     $user->topics()->saveMany(factory(App\Topic::class, 3)->make());

        //     //Seed para a relação com 10 topicMessages
        //     $user->topicMessages()->saveMany(factory(App\TopicMessage::class, 10)->make());

        //     //////////
        //     //Seed para a relação com 4 activityLogs
        //     // $user->activityLogs()->saveMany(factory(App\ActivityLog::class, 4)->make);
        // });

        // DB::statement('SET foreign_key_checks = 1');
    }
}
