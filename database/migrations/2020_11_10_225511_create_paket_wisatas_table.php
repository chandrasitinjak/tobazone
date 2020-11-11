<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaketWisatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket_wisata', function (Blueprint $table) {
            $table->bigIncrements('id_paket');
            $table->string('nama_paket');
            $table->bigInteger('harga_paket');
            $table->integer('availability');
            $table->string('durasi');
            $table->integer('status')->default(1);
            $table->string('jenis_paket');
            $table->text('deskripsi_paket');
            $table->text('rencana_perjalanan')->nullable();
            $table->text('tambahan')->nullable();
            $table->text('gambar');
            $table->unsignedInteger('kabupaten_id');
            $table->foreign('kabupaten_id')->references('id')->on('cities');
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
        Schema::dropIfExists('paket_wisata');
    }
}
