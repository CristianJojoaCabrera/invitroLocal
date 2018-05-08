<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('evaluation_id')->unsigned();
            $table->foreign('evaluation_id')->references('id')->on('evaluations');
            $table->integer('animal_id')->unsigned();
            $table->string('chapeta', 100)->nullable();
            $table->string('diagnostic', 100)->nullable();
            $table->boolean('fit')->default(true);
            $table->boolean('synchronized')->default(false);
            $table->string('other_procedures', 100)->nullable();
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
        Schema::dropIfExists('evaluation_details');
    }
}
