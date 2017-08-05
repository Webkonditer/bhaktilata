<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTextColumnSize extends Migration
{
    private $tables = ['courses' => 'description', 'projects' => 'description', 'pages' => 'content'];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::getConnection()->getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
        foreach ($this->tables as $tableName => $columnName) {
            if (Schema::hasTable($tableName) && Schema::hasColumn($tableName, $columnName)) {
                Schema::table($tableName, function (Blueprint $table) use ($columnName) {
                    DB::statement("ALTER TABLE `{$table->getTable()}` CHANGE `{$columnName}` `{$columnName}` LONGTEXT;");
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Вот эта строчка - грязный хак, чтобы заставить доктрину поверить, что у нас есть enum, иначе она падает
        // Подробности https://github.com/laravel/framework/issues/1186
        Schema::getConnection()->getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
        foreach ($this->tables as $tableName => $columnName) {
            if (Schema::hasTable($tableName) && Schema::hasColumn($tableName, $columnName)) {
                Schema::table($tableName, function (Blueprint $table) use ($columnName) {
                    $table->text($columnName)->nullable()->change();
                });
            }
        }
    }
}
