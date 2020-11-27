<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HomestaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homestays', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('merchant_id');
            $table->string('name');
            $table->integer('price');
            $table->integer('total_room');
            $table->integer('room_available');
            $table->string('description',500)->nullable(false)->change();
            $table->string('address');
            $table->string('image');
            $table->integer('status');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('desa')->nullable(false)->change();;
            $table->string('longitude')->nullable(false)->change();;
            $table->string('latitude')->nullable(false)->change();;

            $table->softDeletes();
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
        Schema::dropIfExists('homestays');
    }
}
