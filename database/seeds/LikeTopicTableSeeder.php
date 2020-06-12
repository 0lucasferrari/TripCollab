<?php

use Illuminate\Database\Seeder;

class LikeTopicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("TRUNCATE TABLE like_topics RESTART IDENTITY CASCADE");

        factory(\App\LikeTopic::class, 100)->create();

        // DB::statement('SET foreign_key_checks = 1');
    }
}
