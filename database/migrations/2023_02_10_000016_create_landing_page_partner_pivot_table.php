<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingPagePartnerPivotTable extends Migration
{
    public function up()
    {
        Schema::create('landing_page_partner', function (Blueprint $table) {
            $table->unsignedBigInteger('landing_page_id');
            $table->foreign('landing_page_id', 'landing_page_id_fk_8008890')->references('id')->on('landing_pages')->onDelete('cascade');
            $table->unsignedBigInteger('partner_id');
            $table->foreign('partner_id', 'partner_id_fk_8008890')->references('id')->on('partners')->onDelete('cascade');
        });
    }
}
