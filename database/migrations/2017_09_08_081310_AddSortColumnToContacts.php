<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSortColumnToContacts extends Migration
{
    private $tableName = 'contacts';
    private $columnName = 'sort';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->tableName)) {
            Schema::table($this->tableName, function (Blueprint $table) {
                $table->integer($this->columnName)->index();
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
        if (Schema::hasTable($this->connection) && Schema::hasColumn($this->tableName, $this->columnName)) {
            Schema::table($this->tableName, function (Blueprint $table) {
                $table->dropColumn($this->columnName);
            });
        }
    }
}
