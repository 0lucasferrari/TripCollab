<?php

use Illuminate\Database\Seeder;
use App\Achievement;

class AchievementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("TRUNCATE TABLE achievements RESTART IDENTITY CASCADE");
        // DB::table('achievements')->truncate();

        $a1 = new Achievement;
        $a1->name = "Pequeno Explorador";
        $a1->description = "Faça parte de 5 comunidades";
        $a1->save();

        $a2 = new Achievement;
        $a2->name = "Prêmio1";
        $a2->description = "Descrição de como conseguir";
        $a2->save();

        $a3 = new Achievement;
        $a3->name = "Prêmio2";
        $a3->description = "Descrição de como conseguir";
        $a3->save();

        $a4 = new Achievement;
        $a4->name = "Prêmio3";
        $a4->description = "Descrição de como conseguir";
        $a4->save();

        // DB::statement('SET foreign_key_checks = 1');
    }
}
