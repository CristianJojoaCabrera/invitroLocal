<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('identification_type_id')->unsigned();
            $table->foreign('identification_type_id')->references('id')->on('document_types');
            $table->string('identification_number', 20)->nullable();
            $table->string('bussiness_name', 150)->nullable();
            $table->string('address', 200)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('cellphone', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('contact', 100)->nullable();
            $table->string('position', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('department', 100)->nullable();
            $table->string('quota', 20)->nullable();
            $table->string('payment_deadline', 20)->nullable();
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
        Schema::dropIfExists('clients');
    }
}
