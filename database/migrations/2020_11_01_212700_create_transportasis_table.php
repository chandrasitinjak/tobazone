<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cbt_id');
            $table->unsignedBigInteger('kabupaten_id');
            $table->string('nama_transportasi');
            $table->string('jenis_transportasi');
            $table->string('alamat');
            $table->string('foto');
            $table->text('deskripsi')->nullable();
            $table->timestamps();


            $table->foreign('cbt_id')->references('id')->on('cbts');
            $table->foreign('kabupaten_id')->references('id')->on('kabupatens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transportasis');
    }
}
