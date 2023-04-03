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
            $table->unsignedBigInteger('engine_id')->nullable();
            $table->foreign('engine_id', 'engine_fk_8067692')->references('id')->on('engines');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('third_parties', function (Blueprint $table) {
            $table->dropForeign(['engine_id']);
            $table->dropColumn('engine_id');
        });
    }
};
