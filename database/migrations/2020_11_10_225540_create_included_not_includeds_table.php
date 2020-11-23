<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncludedNotIncludedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('included_not_included', function (Blueprint $table) {
            $table->bigIncrements('id_ini');
            $table->unsignedBigInteger('paket_wisata_id');
            $table->foreign('paket_wisata_id')->references('id_paket')->on('paket_wisata');
            $table->char('jenis_ini');
            $table->string('keterangan');
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
        Schema::dropIfExists('included_not_included');
    }
}
