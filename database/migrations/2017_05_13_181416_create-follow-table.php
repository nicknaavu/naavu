<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('follows',function(Blueprint $table){
        $table->increments('id');

        //Link to liker
        $table->unsignedInteger('follower_id');
        $table->foreign('follower_id')->
          references('id')->
          on('users');

        //Set up polymorphic like` types
        $table->unsignedInteger('followable_id');
        $table->string('followable_type');

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
      Schema::drop('follows');
    }
}
