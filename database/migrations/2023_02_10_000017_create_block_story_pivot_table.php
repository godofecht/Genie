<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlockStoryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('block_story', function (Blueprint $table) {
            $table->unsignedBigInteger('story_id');
            $table->foreign('story_id', 'story_id_fk_8008854')->references('id')->on('stories')->onDelete('cascade');
            $table->unsignedBigInteger('block_id');
            $table->foreign('block_id', 'block_id_fk_8008854')->references('id')->on('blocks')->onDelete('cascade');
        });
    }
}
