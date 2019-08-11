<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesEventsTable extends Migration
{
    private $tableName = 'courses_events';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tableName)) {
            Schema::create($this->tableName, function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->charset = 'utf8mb4';
                $table->collation = 'utf8mb4_unicode_ci';
                $table->uuid('id')->primary();
                $table->enum('status', ['draft', 'unpublished', 'published', 'deleted'])->index();
                $table->string('title')->nullable();
                $table->date('date_start')->nullable()->index();
                $table->date('date_end')->nullable();
                $table->boolean('dates_confirmed')->default(false);
                $table->string('location')->nullable();
                $table->string('teacher')->nullable();
                $table->string('image')->nullable();
                $table->boolean('is_opened')->default(true);
                $table->string('course_link')->nullable();
                $table->unsignedInteger('user_id')->index();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
