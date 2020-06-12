<?php

use Illuminate\Database\Seeder;
use App\Interest;

class InterestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("TRUNCATE TABLE interests RESTART IDENTITY CASCADE");
        // DB::table('interests')->truncate();

        $i1 = new Interest;
        $i1->name = "Amigos";
        $i1->save();

        $i2 = new Interest;
        $i2->name = "Família";
        $i2->save();

        $i3 = new Interest;
        $i3->name = "Grupo";
        $i3->save();

        $i4 = new Interest;
        $i4->name = "Montanhas";
        $i4->save();

        $i5 = new Interest;
        $i5->name = "Cidade";
        $i5->save();

        $i6 = new Interest;
        $i6->name = "Praia";
        $i6->save();

        $i7 = new Interest;
        $i7->name = "Viagem de Luxo";
        $i7->save();

        $i8 = new Interest;
        $i8->name = "Viagem com Melhor Custo Benefício";
        $i8->save();

        $i9 = new Interest;
        $i9->name = "Viagem Econômica";
        $i9->save();

        // DB::statement('SET foreign_key_checks = 1');
    }
}
