<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_skills',function(Blueprint $table){
          $table->increments('id');
          $table->string('skill');
          $table->text('description')->nullable();
          $table->tinyInteger('level')->default(2); //Default is intermediate skill
          $table->tinyInteger('status')->default(0); //Default is skill is unfilled
          $table->timestamps();
          //Define foreign key with users table
          $table->integer('project_id')->unsigned();
          $table->foreign('project_id')
              ->references('id')
              ->on('projects')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_skills');
    }
}
