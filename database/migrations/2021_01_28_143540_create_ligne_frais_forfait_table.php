<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateLigneFraisForfaitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_frais_forfaits', function (Blueprint $table) {
            $table->unsignedBigInteger('visiteur_id');
            $table->string('mois');
            $table->unsignedBigInteger('FraisForfait_id');
            $table->integer('quantite')->default(null);
            $table->foreign('visiteur_id')->references('id')->on('visiteurs');
            $table->foreign('FraisForfait_id')->references('id')->on('frais_forfaits');
            $table->timestamps();
        });

        DB::unprepared("ALTER TABLE `ligne_frais_forfaits` ADD PRIMARY KEY (`visiteur_id`,`mois`,`FraisForfait_id`)");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ligne_frais_forfait');
    }
}
