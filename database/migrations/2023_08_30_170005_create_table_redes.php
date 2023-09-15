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
        Schema::create('redes', function (Blueprint $table) {
            $table->id();
            $table->integer('tag');
            $table->string('nome');
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('end_rede');
            $table->string('patrimonio')->nullable();
            $table->string('local');
            $table->string('n_serie')->nullable();
            $table->string('gateway')->nullable();
            $table->date('garantia')->nullable();
            $table->string('status')->nullable();
            $table->string('situacao');
            $table->string('portas');
            $table->string('dns')->nullable();
            $table->string('tipo');
            $table->string('ult_alt');  
            $table->string('agente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redes');
    }
};
