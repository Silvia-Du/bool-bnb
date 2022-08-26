<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateVisualizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visualizations', function (Blueprint $table) {
            $table->unsignedBigInteger('announcement_id')
                ->after('id');
            $table->foreign('announcement_id')
                ->references('id')->on('announcements')
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
        Schema::table('visualizations', function (Blueprint $table) {
            $table->dropForeign(['announcement_id']);
            $table->dropColumn('announcement_id');
        });
    }
}
