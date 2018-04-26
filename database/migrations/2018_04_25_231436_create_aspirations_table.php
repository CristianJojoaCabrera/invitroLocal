<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAspirationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspirations', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('order_detail_id')->unsigned();
            $table->foreign('order_detail_id')->references('id')->on('order_details');
            $table->string('synchronized_receivers', 50)->nullable();
            $table->string('medium_lot_miv', 50)->nullable();
            $table->string('medium_opu', 50)->nullable();
            $table->string('medium_lot_opu', 50)->nullable();
            $table->string('aspirator', 50)->nullable();
            $table->string('searcher', 50)->nullable();
            $table->string('arrived_time', 50)->nullable();
            $table->string('arrived_temperature', 50)->nullable();
            $table->string('receiver_name', 50)->nullable();
            $table->string('transport_type', 50)->nullable();
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
        Schema::dropIfExists('aspirations');
    }
}
