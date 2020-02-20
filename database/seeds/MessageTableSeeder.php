<?php

use Illuminate\Database\Seeder;
use App\Message;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET foreign_key_checks = 0');
        DB::table('messages')->truncate();

        factory(\App\Message::class, 4)->create();
        
        // ->each(function($message){

        //     // Seed para a relação com user
        //     $message->user()->save()(factory(\App\User::class)->make());
            
        // });

        DB::statement('SET foreign_key_checks = 1');
    }
}
