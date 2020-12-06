<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HomestayRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homestay_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_homestay');
            $table->string('image');
            $table->string('kategori');
            $table->string('name');
            $table->string('facilities');
            $table->integer('price');
            $table->string('description');
            $table->integer('total_bed');
            $table->boolean('total_extra_bed');
            $table->string('status');
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
        Schema::dropIfExists('homestay_rooms');
    }
}
