<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToneColumnToPromptsTable extends Migration
{
    /**
     * Run the migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prompts', function (Blueprint $table) {
            $table->unsignedBigInteger('tone_id')->nullable();
            $table->foreign('tone_id')->references('id')->on('tones');
        });
    }

    /**
     * Reverse the migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prompts', function (Blueprint $table) {
            $table->dropForeign(['tone_id']);
            $table->dropColumn('tone_id');
        });
    }
}
