<?php

use Illuminate\Database\Seeder;
use App\Topic;

class TopicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("TRUNCATE TABLE topics RESTART IDENTITY CASCADE");

        factory(\App\Topic::class, 100)->create();
        // ->each(function($topic) {

        //     // Seed para a relação com group
        //     $topic->group()->save(factory(App\Group::class)->make());

        //     // Seed para a relação com topicMessages
        //     $topic->topicMessages()->save(factory(App\TopicMessage::class)->make());

        //     // Seed para a relação com user
        //     $topic->user()->save(factory(App\User::class)->make());
        // });

        // DB::statement('SET foreign_key_checks = 1');
    }
}
