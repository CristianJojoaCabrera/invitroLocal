<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiagnosticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnostics', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('order_detail_id')->unsigned();
            $table->foreign('order_detail_id')->references('id')->on('order_details');
            $table->string('received_by', 100)->nullable();
            $table->string('identification_number', 20)->nullable();
            $table->string('comments', 100)->nullable();
            $table->integer('user_id_created')->unsigned();
            $table->foreign('user_id_created')->references('id')->on('users');
            $table->integer('user_id_updated')->unsigned();
            $table->foreign('user_id_updated')->references('id')->on('users');
            $table->integer('state')->unsigned();
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
        Schema::dropIfExists('diagnostics');
    }
}
