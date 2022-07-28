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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('description_courte',80);
            $table->text('description_longue');
            $table->string('image');
            $table->float('prix');
            $table->integer('stock');
            $table->float('note');
            $table->timestamps();

            $table->unsignedBigInteger('gamme_id')->nullable();
            $table->foreign('gamme_id')->references('id')->on('gammes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
