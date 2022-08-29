<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementSponzorizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcement_sponzorization', function (Blueprint $table) {

            //announcment foreign
            $table->unsignedBigInteger('announcement_id');
            $table->foreign('announcement_id')->references('id')->on('announcement')->onDelete('cascade');
            //sponsorization foreign
            $table->unsignedBigInteger('sponzorization_id');
            $table->foreign('sponzorization_id')->references('id')->on('sponzorization')->onDelete('cascade');
            $table->dateTime('start_date');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcement_sponzorization');
    }
}
