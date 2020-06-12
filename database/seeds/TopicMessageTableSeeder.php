<?php

use Illuminate\Database\Seeder;
use App\TopicMessage;

class TopicMessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("TRUNCATE TABLE topic_messages RESTART IDENTITY CASCADE");
        DB::table('topic_messages')->truncate();

        factory(\App\TopicMessage::class, 100)->create();
        // ->each(function($topicMessage){

        //     // Seed para a relação com topic
        //     $topicMessage->topic()->save()(factory(\App\Topic::class)->make());

        //     // Seed para a relação com user
        //     $topicMessage->user()->save()(factory(\App\User::class)->make());

        // });

        // DB::statement('SET foreign_key_checks = 1');
    }
}
