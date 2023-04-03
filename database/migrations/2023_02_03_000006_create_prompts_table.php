<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromptsTable extends Migration
{
    public function up()
    {
        Schema::create('prompts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description');
            $table->text('prompt');
            $table->integer('max_tokens')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
