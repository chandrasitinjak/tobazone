<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('payments')) {
            Schema::create('payments', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('transaction_id')->unsigned();
                $table->integer('product_cost');
                $table->integer('shipping_cost');
                $table->integer('product_discount')->default(0);
                $table->integer('shipping_discount')->default(0);
                $table->string('date')->nullable();
                $table->string('status')->default('pending');
                $table->text('proof')->nullable();
                $table->timestamps();

                $table->foreign('transaction_id')->references('id')->on('transactions');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
