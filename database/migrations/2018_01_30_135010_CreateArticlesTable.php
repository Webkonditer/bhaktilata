<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    private $tableName = 'articles';

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
                $table->date('date')->nullable()->index();
                $table->string('small_image')->nullable();
                $table->string('medium_image')->nullable();
                $table->string('full_image')->nullable();
                $table->string('slug')->unique();
                $table->string('author')->nullable();
                $table->string('announce')->nullable();
                $table->longText('content');
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
