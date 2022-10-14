<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();

            $table->string('title', 100);
            $table->text('description', 10000);
            $table->tinyInteger('bathroom_no')->unsigned();
            $table->tinyInteger('bed_no')->unsigned();
            $table->tinyInteger('room_no')->unsigned();
            $table->smallInteger('square_meters')->unsigned();
            $table->string('address', 100);
            $table->float('latitude', 9, 6);
            $table->float('longitude', 9, 6);
            $table->boolean('is_available')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartments');
    }
}
