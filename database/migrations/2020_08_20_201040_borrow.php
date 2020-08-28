<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Borrow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('borrow', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('book_id')->unsigned()->required();
            $table->BigInteger('user_id')->unsigned()->required();
            $table->integer('status');
            $table->integer('user_register');
            $table->timestamps();
            $table->foreign('book_id')->references('id')->on('Books') ->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users') ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('borrow');
    }
}
