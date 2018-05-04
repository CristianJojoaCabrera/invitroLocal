<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_details', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('transfer_id')->unsigned();
            $table->foreign('transfer_id')->references('id')->on('transfers');
            $table->integer('evaluation_detail_id')->unsigned();
            $table->foreign('evaluation_detail_id')->references('id')->on('evaluations');
            $table->string('embryo', 100)->nullable();
            $table->string('embryo_class', 100)->nullable();
            $table->integer('corpus_luteum')->unsigned();
            $table->string('donor', 50)->nullable();
            $table->string('donor_breed', 50)->nullable();
            $table->string('bull', 50)->nullable();
            $table->string('bull_breed', 50)->nullable();
            $table->string('comments', 100)->nullable();
            $table->integer('user_id_created')->unsigned();
            $table->foreign('user_id_created')->references('id')->on('users');
            $table->integer('user_id_updated')->unsigned();
            $table->foreign('user_id_updated')->references('id')->on('users');

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
        Schema::dropIfExists('transfer_details');
    }
}
