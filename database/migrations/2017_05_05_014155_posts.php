<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts',function(Blueprint $table){
          $table->increments('id');
          $table->string('title');
          $table->text('body');
          $table->timestamps();

          $table->unsignedInteger('user_id');
          $table->foreign('user_id')
            ->references('id')
            ->on('users');

          $table->unsignedInteger('project_id')->nullable();
          $table->foreign('project_id')
            ->references('id')
            ->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
