<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadUserJoin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thread_user', function (Blueprint $table) {
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')
              ->references('id')
              ->on('users');

          $table->integer('thread_id')->unsigned();
          $table->foreign('thread_id')
              ->references('id')
              ->on('threads')
              ->onDelete('cascade');

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
        Schema::drop('thread_user');
    }
}
