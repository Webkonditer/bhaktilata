<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuoteTable extends Migration
{
    private $tableName = 'quote_of_the_day';
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
                $table->date('day')->nullable()->index();
                $table->date('date')->nullable();
                $table->string('location')->nullable();
                $table->text('text');
                $table->string('author')->nullable();
                $table->unsignedInteger('user_id');
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
