<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description');
            $table->decimal('price_monthly', 15, 2);
            $table->decimal('price_yearly', 15, 2);
            $table->string('pp_monthly_plan')->nullable();
            $table->string('pp_yearly_plan')->nullable();
            $table->string('type');
            $table->integer('word_limit');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
