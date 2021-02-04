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
            'nom' => 'Admin',
            'prenom' => 'Admin',
            'adresse' => 'Admin',
            'cp' => 'Admin',
            'ville' => 'Admin',
            'dateEmbauche' => '2021-01-31',
        ]);

        DB::table('users')->insert(
            [
                'name'=>'Admin',
                'email'=>'admin@gsb.com',
                'password'=>bcrypt('admin'),
                'visiteur_id'=>'a1'
            ]
        );

        DB::table('etats')->insert(
            [
                'id' => 'CL',
                'libelle' => 'Saisie Cloturee',
            ]
        );
        DB::table('etats')->insert(
            [
                'id' => 'CR',
                'libelle' => 'Fiche creer, saisie en cours',
            ],
        );
        DB::table('etats')->insert(
            [
                'id' => 'RB',
                'libelle' => 'Renboursee',
            ]
        );
        DB::table('etats')->insert(
            [
                'id' => 'VA',
                'libelle' => 'Validee et mise en paiment',
            ]
        );

        DB::table('frais_forfaits')->insert(
            [
                'id' => 'ETP',
                'libelle' => 'Forfait Etape',
                'montant' => '110.00',
            ]
        );
        DB::table('frais_forfaits')->insert(
            [
                'id' => 'KM',
                'libelle' => 'Frais Kilometrique',
                'montant' => '0.62',
            ]
        );
        DB::table('frais_forfaits')->insert(
            [
                'id' => 'NUI',
                'libelle' => 'Nuitee Hotel',
                'montant' => '80.00',
            ]
        );
        DB::table('frais_forfaits')->insert(
            [
                'id' => 'REP',
                'libelle' => 'Repas Restaurant',
                'montant' => '25.00',
            ]
        );

    }
}
