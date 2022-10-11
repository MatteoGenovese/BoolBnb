<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignApartmentIdOnVisualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visuals', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('apartment_id')->after('id');
            $table->foreign('apartment_id')->references('id')->on('apartments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visuals', function (Blueprint $table) {
            //
            $table->dropForeign('visuals_apartment_id_foreign');
            $table->dropColumn('apartment_id');
        });
    }
}
