<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnlineCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('top_image')->nullable();
            $table->string('title')->nullable();
            $table->string('side_picture')->nullable();
            $table->string('description')->nullable();
            $table->string('benefits_list')->nullable();
            $table->string('topics')->nullable();
            $table->string('date_start')->nullable();
            $table->string('audience')->nullable();
            $table->string('special_requirements')->nullable();
            $table->string('duration')->nullable();
            $table->string('format')->nullable();
            $table->string('teacher')->nullable();
            $table->string('registration_link')->nullable();
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
        Schema::dropIfExists('online_courses');
    }
}
