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
        Schema::create('espacios_ciclos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_ciclo')->unsigned();
            $table->integer('id_espacio')->unsigned();
            
            $table->foreign('id_ciclo')->references('id')->on('ciclos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_espacio')->references('id')->on('espacios_didacticos')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('espacios_ciclos');
    }
};
