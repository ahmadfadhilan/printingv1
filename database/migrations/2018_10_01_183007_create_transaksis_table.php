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
            $table->string('kustomer');
            $table->string('hitam')->nullable();
            $table->string('warna')->nullable();
            $table->string('kertas')->nullable();
            $table->integer('total');
            $table->integer('pembayaran');
            $table->integer('id_asisten')->unsigned();
            $table->timestamps();

            $table->foreign('id_asisten')->references('id_asisten')->on('asistens')->withSuccess('Transaksi Berhasi');
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
