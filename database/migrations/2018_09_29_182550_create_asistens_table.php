<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsistensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistens', function (Blueprint $table) {
            $table->increments('id_asisten');
            $table->unsignedInteger('id_mhs');
            $table->integer('no_anggota')->nullable();
            $table->string('qr_pass')->nullable();

            $table->foreign('id_mhs')->references('id_mhs')->on('mahasiswas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asistens');
    }
}
