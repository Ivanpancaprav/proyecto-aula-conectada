<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('perfiles_monitor', function (Blueprint $table) {

            $table->increments('id');
            $table->string('nombre')->unique();
            $table->integer('FC');
            $table->integer('CO2');
            $table->integer('TA_D');
            $table->integer('TA_S');
            $table->integer('SATO2');

            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfiles_monitores');
    }
};
