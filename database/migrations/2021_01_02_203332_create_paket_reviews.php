<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaketReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('paket_id');
            $table->unsignedInteger('user_id');
            $table->unsignedBigInteger('pemesanan_id');
            $table->text('body');
            $table->timestamps();

            $table->foreign('paket_id')->references('id_paket')->on('paket_wisata');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pemesanan_id')->references('id_pemesanan')->on('pemesanan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paket_reviews');
    }
}
