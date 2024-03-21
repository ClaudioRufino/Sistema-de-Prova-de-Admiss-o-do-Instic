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
        Schema::create('user_pergunta', function (Blueprint $table) {
            $table->unsignedBigInteger('candidato_id');
            $table->unsignedBigInteger('pergunta_id');
            $table->string('candidato_resposta');

            $table->foreign('candidato_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pergunta_id')->references('id')->on('perguntas')->onDelete('cascade');
            $table->primary(['candidato_id', 'pergunta_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_pergunta');
    }
};
