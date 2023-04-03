<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLandingPagesTable extends Migration
{
    public function up()
    {
        Schema::table('landing_pages', function (Blueprint $table) {
            $table->unsignedBigInteger('hero_id')->nullable();
            $table->foreign('hero_id', 'hero_fk_8008889')->references('id')->on('heroes');
            $table->unsignedBigInteger('story_id')->nullable();
            $table->foreign('story_id', 'story_fk_8008891')->references('id')->on('stories');
            $table->unsignedBigInteger('pricing_id')->nullable();
            $table->foreign('pricing_id', 'pricing_fk_8008892')->references('id')->on('pricings');
            $table->unsignedBigInteger('testimonial_id')->nullable();
            $table->foreign('testimonial_id', 'testimonial_fk_8008893')->references('id')->on('testimonials');
        });
    }
}
