<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes',function(Blueprint $table){
          $table->increments('id');

          //Link to liker
          $table->unsignedInteger('liker_id');
          $table->foreign('liker_id')->
            references('id')->
            on('users');

          //Set up polymorphic like` types
          $table->unsignedInteger('likable_id');
          $table->string('likable_type');

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
        Schema::drop('likes');
    }
}
