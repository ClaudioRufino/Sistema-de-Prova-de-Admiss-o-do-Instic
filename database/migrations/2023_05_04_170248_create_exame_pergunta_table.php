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
        Schema::create('exame_pergunta', function (Blueprint $table) {
            $table->unsignedBigInteger('exame_id');
            $table->unsignedBigInteger('pergunta_id');

            $table->foreign('exame_id')->references('id')->on('exames')->onDelete('cascade');
            $table->foreign('pergunta_id')->references('id')->on('perguntas')->onDelete('cascade');
            $table->primary(['exame_id', 'pergunta_id']);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exame_pergunta');
    }
};
