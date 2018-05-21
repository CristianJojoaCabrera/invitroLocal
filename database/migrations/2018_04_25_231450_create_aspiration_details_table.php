<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAspirationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspiration_details', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('aspiration_id')->unsigned();
            $table->foreign('aspiration_id')->references('id')->on('aspirations');
            $table->string('donor', 50)->nullable();
            $table->string('donor_breed', 50)->nullable();
            $table->string('bull', 50)->nullable();
            $table->string('bull_breed', 50)->nullable();
            $table->string('type', 50)->nullable();
            $table->integer('gi');
            $table->integer('gii');
            $table->integer('giii');
            $table->integer('others');
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
        Schema::dropIfExists('aspiration_details');
    }
}
