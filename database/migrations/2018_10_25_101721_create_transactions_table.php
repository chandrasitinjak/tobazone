<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('transactions')) {

            Schema::create('transactions', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('customer_id')->unsigned();
                $table->integer('merchant_id')->unsigned();
                $table->string('shipping_number')->nullable();
                $table->string('courier');
                $table->string('address');
                $table->string('status');
                $table->integer('confirm_user')->default(0);
                $table->timestamps();

                $table->foreign('customer_id')->references('id')->on('users');
                $table->foreign('merchant_id')->references('id')->on('users');
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
        Schema::dropIfExists('transactions');
    }
}
