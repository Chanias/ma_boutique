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
        Schema::create('commande_models', function (Blueprint $table) {
            $table->id();
            $table->numero_commande();
            $table->prix();
            $table->timestamps();

            $table->foreignId('user_id')->constrained();
            $table->foreignId('adresse_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commande_models');
    }
};
