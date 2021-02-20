<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelBooksCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('rel_books_category', function (Blueprint $table) {
            $table->bigInteger('idbook')->unsigned()->required();
            $table->bigInteger('category_id')->unsigned()->required();
            $table->integer('user_register');
            $table->timestamps();
            $table->foreign('idbook')->references('id')->on('Books')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('Category')->onDelete('cascade');
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
        Schema::dropIfExists('rel_books_category');
    }
}
