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
        Schema::create('computadores', function (Blueprint $table) {
            $table->id();
            $table->integer('tag');
            $table->string('nome');
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('proprietario');
            $table->string('so');
            $table->string('processador');
            $table->string('memoria');
            $table->string('disco_rigido');
            $table->string('placa_video');
            $table->string('placa_rede');
            $table->string('status')->nullable();
            $table->string('ult_alt');  
            $table->date('garantia')->nullable();
            $table->string('patrimonio')->nullable();
            $table->string('agente');
            $table->string('local');
            $table->string('situacao');

            $table->timestamps();
        });

       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_itens');
    }
};
