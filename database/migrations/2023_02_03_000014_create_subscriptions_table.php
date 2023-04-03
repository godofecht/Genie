<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('start_at')->nullable();
            $table->dateTime('end_at')->nullable();
            $table->dateTime('canceled_at')->nullable();
            $table->string('status');
            $table->string('payment_frequency')->nullable();
            $table->string('pp_subscription')->nullable();
            $table->integer('usage')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
