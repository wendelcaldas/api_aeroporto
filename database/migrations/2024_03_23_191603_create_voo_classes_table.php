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
        Schema::create('voo_classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('voo_id');
            $table->string('classe_nome');
            $table->integer('assentos');
            $table->decimal('valor_assento', 10, 2);
            $table->timestamps();
        
            $table->foreign('voo_id')->references('id')->on('voos');

            $table->unique(['voo_id', 'classe_nome']); // relação unica entre 2 colunas
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voo_classes');
    }
};
