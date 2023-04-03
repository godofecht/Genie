<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTonesTable extends Migration
{
    public function up()
    {
        Schema::create('tones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tone');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
