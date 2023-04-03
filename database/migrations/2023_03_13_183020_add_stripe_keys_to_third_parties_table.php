<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('third_parties', function (Blueprint $table) {
            $table->string('stripe_key')->nullable();
            $table->string('stripe_secret')->nullable();
            $table->string('stripe_webhook_secret')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('third_parties', function (Blueprint $table) {
            $table->dropColumn([
                'stripe_key',
                'stripe_secret',
                'stripe_webhook_secret',
            ]);
        });
    }
};
