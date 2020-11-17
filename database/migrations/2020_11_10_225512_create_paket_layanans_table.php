<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaketLayanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket_layanans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('paket_wisata_id');
            $table->foreign('paket_wisata_id')->references('id_paket')->on('paket_wisata');
            $table->unsignedBigInteger('layanan_wisata_id');
            $table->foreign('layanan_wisata_id')->references('id')->on('layanan_wisata');
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
        Schema::dropIfExists('paket_layanans');
    }
}
