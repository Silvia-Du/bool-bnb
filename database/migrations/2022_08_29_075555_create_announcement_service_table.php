<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcement_service', function (Blueprint $table) {
            $table->unsignedBigInteger('announcement_id');
            // creo la FK per la colonna appena creata
            $table->foreign('announcement_id')
                ->references('id')
                ->on('announcements')
                ->onDelete('cascade'); // all'eliminazione di un post o un tag a cascata viene eliminato il record nella tabella ponte

            //creao la colonna per la FK di tags
            $table->unsignedBigInteger('service_id');
            // creo la FK per la colonna appena creata
            $table->foreign('service_id')
                ->references('id')
                ->on('services')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcement_service');
    }
}
