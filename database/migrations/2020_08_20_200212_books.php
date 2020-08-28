<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Books extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_book')->nullable()->unique();
            $table->string('author');
            $table->date('public_date');
            $table->integer('user_register');
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
        //
        Schema::dropIfExists('Books');
    }
}
