<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAnswersTable extends Migration
{
    public function up()
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->unsignedBigInteger('question_id')->nullable();
            $table->foreign('question_id', 'question_fk_7934194')->references('id')->on('questions');
            $table->unsignedBigInteger('content_id')->nullable();
            $table->foreign('content_id', 'content_fk_7934195')->references('id')->on('contents');
        });
    }
}
