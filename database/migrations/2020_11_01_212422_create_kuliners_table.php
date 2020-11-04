<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKulinersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(255);
        Schema::create('kuliners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_kuliner');
            $table->string('jenis_kuliner');
            $table->string('longitude');
            $table->string('foto');
            $table->string('latitude');
            $table->string('lokasi');
            $table->text('deskripsi')->nullable();
            $table->unsignedBigInteger('cbt_id');
            $table->unsignedBigInteger('kabupaten_id');
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
        Schema::dropIfExists('kuliners');
    }
}
