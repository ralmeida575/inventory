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
        Schema::create('hardware', function (Blueprint $table) {
            $table->id();
            $table->string('tag')->nullable();
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('fornecedor')->nullable();
            $table->string('patrimonio')->nullable();
            $table->string('n_serie')->nullable();
            $table->string('tipo');
            $table->string('garantia')->nullable();
            $table->string('data_instal')->nullable();
            $table->string('situacao');
            $table->string('local');
            $table->string('status');
            $table->string('ult_alt'); 
            $table->string('agente');
            $table->string('proprietario')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hardware');
    }
};
