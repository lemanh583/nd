<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterForeignVillages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('villages', function (Blueprint $table) {
            $table->unsignedBigInteger('id_dis');
            $table->foreign('id_dis')->references('id_dis')->on('districts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('villages', function (Blueprint $table) {
            $table->dropForeign('villages_id_dis_foreign');
        });
    }
}
