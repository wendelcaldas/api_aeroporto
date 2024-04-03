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
        Schema::create('voos', function (Blueprint $table) {
            $table->id();
            $table->string('numero_voo', 5)->unique();
            $table->unsignedBigInteger('aeroporto_origem_id');
            $table->unsignedBigInteger('aeroporto_destino_id');
            $table->dateTime('partida_datetime');
            $table->timestamps();
        
            $table->foreign('aeroporto_origem_id')->references('id')->on('aeroportos');
            $table->foreign('aeroporto_destino_id')->references('id')->on('aeroportos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voos');
    }
};
