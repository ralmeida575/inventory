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
        Schema::create('infraestrutura', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable();
            $table->string('marca');
            $table->string('modelo');
            $table->string('n_serie')->nullable();
            $table->integer('metros_total')->nullable();
            $table->integer('metros_qtde_usado')->nullable();
            $table->integer('metros_disponivel')->nullable();
            $table->string('status')->nullable();
            $table->string('agente');
            $table->string('local')->nullable();
            $table->string('ult_alt'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infraestrutura');
    }
};
