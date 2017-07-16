<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('pages')) {
            Schema::create('pages', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->charset = 'utf8mb4';
                $table->collation = 'utf8mb4_unicode_ci';
                $table->uuid('id')->primary();
                $table->enum('status', ['draft', 'unpublished', 'published', 'deleted'])->index('page_status');
                $table->string('path', 191)->index('page_slug');
                $table->string('title', 255);
                $table->text('content')->nullable();
                $table->unsignedInteger('user_id');
                $table->string('meta_title', 255)->nullable();
                $table->string('meta_description', 600)->nullable();
                $table->string('meta_keywords', 255)->nullable();
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
        Schema::dropIfExists('pages');
    }
}
