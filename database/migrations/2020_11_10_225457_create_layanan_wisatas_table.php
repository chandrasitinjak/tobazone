<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLayananWisatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layanan_wisata', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_layanan');
            $table->unsignedBigInteger('jenisLayanan_id');
            $table->unsignedInteger('kabupaten_id');
            $table->unsignedBigInteger('member_id');
            $table->text('deskripsi_layanan')->nullable();
            $table->timestamps();

            $table->foreign('jenislayanan_id')->references('id')->on('jenis_layanan');
            $table->foreign('kabupaten_id')->references('id')->on('cities');
            $table->foreign('member_id')->references('id')->on('member');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('layanan_wisata');
    }
}
