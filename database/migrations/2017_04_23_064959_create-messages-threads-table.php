<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_thread',function(Blueprint $table){
          $table->integer('message_id')->unsigned();
          $table->foreign('message_id')
            ->references('id')
            ->on('messages');

          $table->integer('thread_id')->unsigned();
          $table->foreign('thread_id')
            ->references('id')
            ->on('threads');

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
        Schema::dropIfExists('message_thread');
    }
}
