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
        Schema::create('documentos', function (Blueprint $table) {
            
            $table->increments('id');
            $table->enum('extension',['video','pdf','imagen']);
            $table->string('nombre');
            $table->string('url');
            $table->integer('id_bloque')->unsigned();
            $table->foreign('id_bloque')->references('id')->on('bloques')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
