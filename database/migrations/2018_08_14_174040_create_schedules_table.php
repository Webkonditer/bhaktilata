<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('course_id')->unsigned()->default(1);
            $table->foreign('course_id')->references('id')->on('course_lists');
            $table->string('city');
            $table->string('place');
            $table->date('beginning_date');
            $table->date('expiration_date');
            $table->boolean('is_opened');
            $table->string('cost');
            $table->string('accommodation');
            $table->string('format');
            $table->string('homework');
            $table->string('requirements_for_students');
            $table->string('contacts');
            $table->string('teacher');
            $table->string('teacher_foto');
            $table->string('course_link');
            $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
