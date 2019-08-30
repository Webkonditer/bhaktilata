<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardOfCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_of_courses', function (Blueprint $table) {
          $table->increments('id');
          $table->string('picture')->nullable();
          $table->string('title')->nullable();
          $table->text('description')->nullable();
          $table->string('topics')->nullable();
          $table->string('date_start')->nullable();
          $table->string('audience')->nullable();
          $table->string('duration')->nullable();
          $table->string('format')->nullable();
          $table->string('teacher')->nullable();
          $table->string('course_link')->nullable();
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
        Schema::dropIfExists('card_of_courses');
    }
}
