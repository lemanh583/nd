<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterForeignDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('details', function (Blueprint $table) {
            $table->unsignedBigInteger('id_category');
            $table->unsignedBigInteger('id_type');
            $table->unsignedBigInteger('id_map');
            $table->unsignedBigInteger('id');
            $table->foreign('id_category')->references('id_category')->on('categories');
            $table->foreign('id_type')->references('id_type')->on('types');
            $table->foreign('id_map')->references('id_map')->on('maps');
            $table->foreign('id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('details', function (Blueprint $table) {
            $table->dropForeign('details_id_category_foreign');
            $table->dropForeign('details_id_type_foreign');
            $table->dropForeign('details_id_map_foreign');
            $table->dropForeign('details_id_foreign');
            
        });
    }
}
