<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('product_reviews')) {
            Schema::create('product_reviews', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('product_id')->unsigned();
                $table->integer('user_id')->unsigned();
                $table->integer('transaction_id')->unsigned();
                $table->text('body');
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users');
                $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('product_reviews');
    }
}
