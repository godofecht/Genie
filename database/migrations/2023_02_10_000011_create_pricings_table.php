<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricingsTable extends Migration
{
    public function up()
    {
        Schema::create('pricings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->text('promotion')->nullable();
            $table->timestamps();
        });
    }
}
