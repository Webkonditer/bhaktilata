<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImagesToPagesTable extends Migration
{
    private $tableName = 'pages';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->tableName)) {
            Schema::table($this->tableName, function (Blueprint $table) {
                $table->string('image', 600)->nullable();
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
        if (\Schema::hasTable($this->tableName) && \Schema::hasColumn($this->tableName, 'image')) {
            \Schema::table($this->tableName, function (Blueprint $table) {
                $table->dropColumn('image');
            });
        }
    }
}
