<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromptQuestionPivotTable extends Migration
{
    public function up()
    {
        Schema::create('prompt_question', function (Blueprint $table) {
            $table->unsignedBigInteger('prompt_id');
            $table->foreign('prompt_id', 'prompt_id_fk_7943885')->references('id')->on('prompts')->onDelete('cascade');
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id', 'question_id_fk_7943885')->references('id')->on('questions')->onDelete('cascade');
        });
    }
}
