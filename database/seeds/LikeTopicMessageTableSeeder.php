<?php

use Illuminate\Database\Seeder;

class LikeTopicMessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("TRUNCATE TABLE like_topic_messages RESTART IDENTITY CASCADE");
        // DB::table('like_topic_messages')->truncate();

        factory(\App\LikeTopicMessage::class, 100)->create();

        // DB::statement('SET foreign_key_checks = 1');
    }
}
