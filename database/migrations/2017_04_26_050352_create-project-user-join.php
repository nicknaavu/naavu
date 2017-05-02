<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectUserJoin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('project_user',function(Blueprint $table){
        $table->integer('project_id')->unsigned();
        $table->foreign('project_id')->
          references('id')->
          on('projects');

        $table->integer('user_id')->unsigned();
        $table->foreign('user_id')->
          references('id')->
          on('users');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('project_user');
    }
}
