<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisiteurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visiteurs', function (Blueprint $table) {
            $table->char('id')->primary();
            $table->string('nom');
            $table->string('prenom');
            $table->string('login');
            $table->string('mdp');
            $table->string('adresse');
            $table->string('cp');
            $table->string('ville');
            $table->date('dateEmbauche');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visiteur');
    }
}
