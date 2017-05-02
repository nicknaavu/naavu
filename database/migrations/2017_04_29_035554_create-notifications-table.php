<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications',function(Blueprint $table){
          $table->increments('id');
          $table->string('type');

          //Set up relationship to sender
          $table->unsignedInteger('sender_id');
          $table->foreign('sender_id')->
            references('id')->
            on('users');

          //Set up relationship to recipient
          $table->unsignedInteger('recipient_id');
          $table->foreign('recipient_id')->
            references('id')->
            on('users');

          //Set up polymorphic notification types
          $table->unsignedInteger('notifiable_id');
          $table->string('notifiable_type');

          //Timestamps
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
        Schema::drop('notifications');
    }
}
