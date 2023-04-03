<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToContentsTable extends Migration
{
    public function up()
    {
        Schema::table('contents', function (Blueprint $table) {
            $table->unsignedBigInteger('prompt_id')->nullable();
            $table->foreign('prompt_id', 'prompt_fk_7934181')->references('id')->on('prompts');
            $table->unsignedBigInteger('tone_id')->nullable();
            $table->foreign('tone_id', 'tone_fk_7934190')->references('id')->on('tones');
        });
    }
}
