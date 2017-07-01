<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseAndCourseCategoryTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('course_categories')) {
			Schema::create('course_categories', function (Blueprint $table) {
				$table->engine = 'InnoDB';
				$table->charset = 'utf8mb4';
				$table->collation = 'utf8mb4_unicode_ci';
				$table->uuid('id')->primary();
				$table->enum('status', ['draft', 'unpublished', 'published', 'deleted'])->index('course_category_status');
				$table->string('slug', 191)->index('courses_slug');
				$table->string('title', 255);
				$table->text('description')->nullable();
				$table->string('meta_title', 255)->nullable();
				$table->string('meta_description', 600)->nullable();
				$table->string('meta_keywords', 255)->nullable();
				$table->timestamps();
			});
		}
		if (!Schema::hasTable('courses')) {
			Schema::create('courses', function (Blueprint $table) {
				$table->engine = 'InnoDB';
				$table->charset = 'utf8mb4';
				$table->collation = 'utf8mb4_unicode_ci';
				$table->uuid('id')->primary();
				$table->enum('status', ['draft', 'unpublished', 'published', 'deleted'])->index('courses_status');
				$table->string('slug', 191)->index('courses_slug');
				$table->string('category_id', 191)->index('courses_category');
				$table->string('title', 255);
				$table->string('announce', 600)->nullable();
				$table->text('description')->nullable();
				$table->string('meta_title', 255)->nullable();
				$table->string('meta_description', 600)->nullable();
				$table->string('meta_keywords', 255)->nullable();
				$table->timestamps();
			});
			Schema::table('courses', function($table) {
				$table->foreign('category_id')->references('id')->on('course_categories');
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
		Schema::dropIfExists('courses');
		Schema::dropIfExists('course_categories');
	}
}
