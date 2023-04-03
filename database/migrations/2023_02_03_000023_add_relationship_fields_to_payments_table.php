<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_7972423')->references('id')->on('users');
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->foreign('currency_id', 'currency_fk_7972424')->references('id')->on('currencies');
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->foreign('payment_method_id', 'payment_method_fk_7972425')->references('id')->on('payment_methods');
            $table->unsignedBigInteger('subscription_id')->nullable();
            $table->foreign('subscription_id', 'subscription_fk_7972426')->references('id')->on('subscriptions');
        });
    }
}
