<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('crossword_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('set_id');
            $table->text('question');
            $table->string('answer');
            $table->timestamps();

            $table->foreign('set_id')->references('id')->on('crossword_sets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crossword_questions');
    }
};
