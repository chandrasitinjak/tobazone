<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudayasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budayas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cbt_id');
            $table->unsignedBigInteger('kabupaten_id');
            $table->string('nama_budaya');
            $table->text('deskripsi')->nullable();
            $table->string('foto');
            $table->string('lokasi');
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
        Schema::dropIfExists('budayas');
    }
}
