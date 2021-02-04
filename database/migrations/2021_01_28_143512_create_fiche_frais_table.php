<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateFicheFraisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiche_frais', function (Blueprint $table) {
            $table->char("visiteur_id");
            $table->string('mois');
            $table->integer('nbJustificatifs');
            $table->decimal('montantValide');
            $table->date('dateModif');
            $table->char('id_Etat');
            $table->foreign('visiteur_id')->references('id')->on('visiteurs');
            $table->foreign('id_Etat')->references('id')->on('etats');
        });

        DB::unprepared("ALTER TABLE `fiche_frais` ADD PRIMARY KEY (`visiteur_id`,`mois`)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fiche_frais');
    }
}
