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
        Schema::table('descricoes_faq', function (Blueprint $table) {
            $table->foreignId('faq_id')->references('id')->on('faq');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('descricoes_faq', function (Blueprint $table) {
            //
        });
    }
};
