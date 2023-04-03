<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('question');
            $table->string('type');
            $table->string('is_required');
            $table->integer('minimum_answer_length');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
