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
            $table->increments('id');
            $table->string('donadora', 100);
            $table->string('donadora_raza', 100);
            $table->string('toro', 100);
            $table->string('toro_raza', 100);
            $table->string('tipo', 100);
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
