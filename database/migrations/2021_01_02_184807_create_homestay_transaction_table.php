<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomestayTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homestay_transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('homestay_id');
            $table->string('check_in');
            $table->integer('duration');
            $table->integer('price');
            $table->integer('rooms');
            $table->string('payment_method');
            $table->boolean('is_paid');
            $table->string('status');
            $table->string('resi');
            $table->string('nama_pengirim');
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
        Schema::dropIfExists('homestay_transaction');
    }
}
