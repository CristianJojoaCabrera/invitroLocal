<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_details', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('production_id')->unsigned();
            $table->foreign('production_id')->references('id')->on('productions');
            $table->integer('aspiration_detail_id')->unsigned();
            $table->foreign('aspiration_detail_id')->references('id')->on('aspiration_details');
            $table->string('bull', 50);
            $table->string('bull_breed', 50);
            $table->integer('civ');
            $table->string('medium_cultivation', 50);
            $table->string('lot_medium', 50);
            $table->integer('cleavage');
            $table->integer('feeding1');
            $table->integer('feeding2');
            $table->integer('c5');
            $table->integer('prevision');
            $table->integer('bi');
            $table->integer('bl');
            $table->integer('bx');
            $table->integer('bn');
            $table->integer('be');
            $table->integer('vitrified');
            $table->integer('frozen');
            $table->integer('lost');
            $table->integer('transferred_embryos');
            $table->integer('discarded');
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
        Schema::dropIfExists('production_details');
    }
}
