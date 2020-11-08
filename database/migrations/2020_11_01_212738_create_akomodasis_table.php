<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAkomodasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('akomodasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('longitude');
            $table->string('latitude');
            $table->string('foto');
            $table->unsignedBigInteger('cbt_id');
            $table->unsignedBigInteger('kabupaten_id');
            $table->unsignedBigInteger('category_akomodasi_id');
            $table->string('nama_akomodasi');
            $table->string('lokasi');
            $table->text('deskripsi')->nullable();
            $table->timestamps();


            $table->foreign('cbt_id')->references('id')->on('cbts');
            $table->foreign('kabupaten_id')->references('id')->on('kabupatens');
            $table->foreign('category_akomodasi_id')->references('id')->on('akomodasis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('akomodasis');
    }
}
