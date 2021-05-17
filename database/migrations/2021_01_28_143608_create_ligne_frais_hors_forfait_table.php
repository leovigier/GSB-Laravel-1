<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneFraisHorsForfaitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_frais_hors_forfaits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('visiteur_id');
            $table->string('mois');
            $table->string('libelle')->default(null);
            $table->date('date')->default(null);
            $table->decimal('montant')->default(null);
            $table->foreign('visiteur_id')->references('id')->on('visiteurs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ligne_frais_hors_forfait');
    }
}
