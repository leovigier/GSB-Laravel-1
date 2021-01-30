<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('visiteurs')->insert(
            [
                'id' => 'a1',
                'nom' => 'Didier',
                'prenom' => 'Simon',
                'login' => 'simondidier.pro@gmail.com',
                'mdp' => 'didier333',
                'adresse' => '11 rue romain rolland',
                'cp' => '69500',
                'ville' => 'Bron',
                'dateEmbauche' => '2021-01-29',
            ]
        );
        DB::table('users')->insert(
            [
                'name'=>'simon',
                'email'=>'simondidier.pro@gmail.com',
                'password'=>bcrypt('didier333'),
                'visiteur_id' => 'a1',
            ]
        );

    }
}
