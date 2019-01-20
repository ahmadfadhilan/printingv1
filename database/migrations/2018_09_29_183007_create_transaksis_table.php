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
            $table->string('hitam')->nullable()->default(0);
            $table->string('warna')->nullable()->default(0);
            $table->string('kertas')->nullable()->default(0);
            $table->integer('total');
            $table->integer('pembayaran');
            $table->integer('id_asisten')->unsigned();
            $table->timestamps();

            $table->foreign('id_asisten')->references('id_asisten')->on('asistens');
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
