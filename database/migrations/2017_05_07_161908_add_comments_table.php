<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments',function(Blueprint $table){
          $table->increments('id');
          $table->text('body');
          $table->timestamps();

          //Set up relationship to sender
          $table->unsignedInteger('commenter_id');
          $table->foreign('commenter_id')->
            references('id')->
            on('users');

          //Set up polymorphic notification types
          $table->unsignedInteger('commentable_id');
          $table->string('commentable_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }
}
