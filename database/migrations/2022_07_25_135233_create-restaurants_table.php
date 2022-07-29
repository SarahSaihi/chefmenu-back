<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('namerestaurant');
            $table->string('adress');
            $table->string('hours');
            $table->string('picture');
            $table->string('message');
            $table->unsignedBigInteger('restorer_id'); // Création de la colonne
            $table->timestamps();

            $table->foreign('restorer_id')->references('id')->on('restorers'); // Ajoute la contrainte de clef étrangère
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
};
