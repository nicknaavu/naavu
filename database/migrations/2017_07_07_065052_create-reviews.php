<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('reviews',function(Blueprint $table){
        //Basic id
        $table->increments('id');

        //Content
        $table->string('subject');
        $table->text('body');

        //Link to reviewer and reviewwee
        $table->unsignedInteger('reviewer_id');
        $table->foreign('reviewer_id')->
          references('id')->
          on('users');

        $table->unsignedInteger('reviewee_id');
        $table->foreign('reviewee_id')->
          references('id')->
          on('users');

        //Additional fields
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
        Schema::drop('reviews');
    }
}
