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
                'visiteur_id'=>'1'
            ]
        );

        DB::table('etats')->insert(
            [
                'id' => '1',
                'libelle' => 'Saisie Cloturee',
            ]
        );
        DB::table('etats')->insert(
            [
                'id' => '2',
                'libelle' => 'Fiche creer, saisie en cours',
            ],
        );
        DB::table('etats')->insert(
            [
                'id' => '3',
                'libelle' => 'Renboursee',
            ]
        );
        DB::table('etats')->insert(
            [
                'id' => '4',
                'libelle' => 'Validee et mise en paiment',
            ]
        );

        DB::table('frais_forfaits')->insert(
            [
                'id' => '1',
                'libelle' => 'Forfait Etape',
                'montant' => '110.00',
            ]
        );
        DB::table('frais_forfaits')->insert(
            [
                'id' => '2',
                'libelle' => 'Frais Kilometrique',
                'montant' => '0.62',
            ]
        );
        DB::table('frais_forfaits')->insert(
            [
                'id' => '3',
                'libelle' => 'Nuitee Hotel',
                'montant' => '80.00',
            ]
        );
        DB::table('frais_forfaits')->insert(
            [
                'id' => '4',
                'libelle' => 'Repas Restaurant',
                'montant' => '25.00',
            ]
        );

    }
}
