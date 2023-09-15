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
        Schema::create('descricoes_infraestrutura', function (Blueprint $table) {
            $table->id();
            $table->longText('descricao_texto');
            $table->string('data_comentario');
            $table->string('agente_infraestrutura');
            $table->longText('alteracoes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('descricoes_infraestrutura');
    }
};
