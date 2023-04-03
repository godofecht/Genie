<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThirdPartiesTable extends Migration
{
    public function up()
    {
        Schema::create('third_parties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('openai_api_key')->nullable();
            $table->integer('default_max_tokens')->nullable();
            $table->string('pp_client')->nullable();
            $table->string('pp_secret')->nullable();
            $table->string('pp_env')->nullable();
            $table->timestamps();
        });
    }
}
