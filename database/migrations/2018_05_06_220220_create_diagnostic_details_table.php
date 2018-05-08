<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiagnosticDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnostic_details', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('diagnostic_id')->unsigned();
            $table->foreign('diagnostic_id')->references('id')->on('diagnostics');
            $table->integer('transfer_detail_id')->unsigned();
            $table->foreign('transfer_detail_id')->references('id')->on('transfer_details');
            $table->string('dx1', 1)->nullable();
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
        Schema::dropIfExists('diagnostic_details');
    }
}
