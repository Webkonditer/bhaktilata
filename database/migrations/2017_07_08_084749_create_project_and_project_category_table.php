<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectAndProjectCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('projects_categories')) {
            Schema::create('projects_categories', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->charset = 'utf8mb4';
                $table->collation = 'utf8mb4_unicode_ci';
                $table->uuid('id')->primary();
                $table->enum('status', ['draft', 'unpublished', 'published', 'deleted'])->index('course_category_status');
                $table->string('slug', 191)->index('project_category_slug');
                $table->string('title', 255);
                $table->text('description')->nullable();
                $table->string('parent_id', 191)->index('project_category_parent')->nullable();
                $table->string('meta_title', 255)->nullable();
                $table->string('meta_description', 600)->nullable();
                $table->string('meta_keywords', 255)->nullable();
                $table->timestamps();
            });
            Schema::table('projects_categories', function($table) {
                $table->foreign('parent_id')->references('id')->on('projects_categories');
            });
        }
        if (!Schema::hasTable('projects')) {
            Schema::create('projects', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->charset = 'utf8mb4';
                $table->collation = 'utf8mb4_unicode_ci';
                $table->uuid('id')->primary();
                $table->enum('status', ['draft', 'unpublished', 'published', 'deleted'])->index('courses_status');
                $table->string('slug', 191)->index('project_slug');
                $table->string('category_id', 191)->index('project_category');
                $table->string('title', 255);
                $table->string('announce', 600)->nullable();
                $table->text('description')->nullable();
                $table->string('link', 191)->nullable();
                $table->boolean('is_opened')->default(false);
                $table->string('meta_title', 255)->nullable();
                $table->string('meta_description', 600)->nullable();
                $table->string('meta_keywords', 255)->nullable();
                $table->timestamps();
            });
            Schema::table('projects', function($table) {
                $table->foreign('category_id')->references('id')->on('projects_categories');
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
        Schema::dropIfExists('projects');
        Schema::dropIfExists('projects_categories');
    }
}
