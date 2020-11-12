<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomunitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komunitas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('kabupaten_id');
            $table->string('nama_komunitas');
            $table->text('deskripsi');
            $table->string('gambar');
            $table->string('link');
            $table->timestamps();

            $table->foreign('kabupaten_id')->references('id_kabupaten')->on('kabupatens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komunitas');
    }
}
