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
            'login' => 'unLogin',
            'mdp' => 'unMdp',
            'adresse' => 'uneAdresse',
            'cp' => 'unCP',
            'ville' => 'uneVille',
            'dateEmbauche' => '2021-05-12',
        ]);

        DB::table('users')->insert(
            [
                'name'=>'Simon',
                'email'=>'simondidier.pro@gmail.com',
                'password'=>bcrypt('didier333'),
                'visiteur_id'=>'a1'
            ]
        );

        DB::table('visiteurs')->insert(
            [
                'id' => 'a2',
                'nom' => 'Admin',
                'prenom' => 'Admin',
                'adresse' => 'Admin',
                'cp' => 'Admin',
                'ville' => 'Admin',
                'dateEmbauche' => '2021-01-31',
            ]);

        DB::table('users')->insert(
        [
            'name'=>'Quentin',
            'email'=>'unEmail@gmail.com',
            'password'=>bcrypt('test'),
            'visiteur_id'=> 'a2',
        ]);

    }
}
