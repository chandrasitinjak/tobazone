<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSesisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sesi', function (Blueprint $table) {
            $table->bigIncrements('id_sesi');
            $table->unsignedBigInteger('paket_id');
            $table->foreign('paket_id')->references('id_paket')->on('paket_wisata');
            $table->integer('kuota_peserta');
            $table->string('jadwal');
            $table->integer('status');
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
        Schema::dropIfExists('sesi');
    }
}
