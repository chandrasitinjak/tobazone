<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('member')) {
            Schema::create('member', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users');
                $table->string('photo')->nullable();
                $table->string('no_KTP');
                $table->timestamps();
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
        Schema::dropIfExists('member');
    }
}
