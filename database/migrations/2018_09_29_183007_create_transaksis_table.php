<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id_trans');
            $table->string('nama_printing');
            $table->integer('total');
            $table->integer('id_asisten')->unsigned();
            $table->integer('id_print')->unsigned();
            $table->timestamps();

            $table->foreign('id_asisten')->references('id_asisten')->on('asistens');
            $table->foreign('id_print')->references('id_print')->on('prints');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
