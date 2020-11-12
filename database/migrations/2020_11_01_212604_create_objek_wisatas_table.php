<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjekWisatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objek_wisatas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_objek_wisata');
            $table->string('lokasi');
            $table->string('foto');
            $table->string('status');
            $table->string('longitude');
            $table->string('latitude');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('kabupaten_id');
            $table->text('deskripsi')->nullable();
            $table->unsignedBigInteger('member_id');
            $table->timestamps();


            $table->foreign('category_id')->references('id')->on('category_wisatas');
            $table->foreign('member_id')->references('id')->on('member');
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
        Schema::dropIfExists('objek_wisatas');
    }
}
