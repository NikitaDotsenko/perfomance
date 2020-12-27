<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateXhprofDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        /**
//         * When setting the `id` column, consider the length of the prefix you're specifying in $this->prefix
//         *
//         *
//        CREATE TABLE `details` (
//        `id` char(17) NOT NULL,
//        `url` varchar(255) default NULL,
//        `c_url` varchar(255) default NULL,
//        `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
//        `server name` varchar(64) default NULL,
//        `perfdata` MEDIUMBLOB,
//        `type` tinyint(4) default NULL,
//        `cookie` BLOB,
//        `post` BLOB,
//        `get` BLOB,
//        `pmu` int(11) unsigned default NULL,
//        `wt` int(11) unsigned default NULL,
//        `cpu` int(11) unsigned default NULL,
//        `server_id` char(17) NOT NULL default 't11',
//        `aggregateCalls_include` varchar(255) DEFAULT NULL,
//        PRIMARY KEY  (`id`),
//        KEY `url` (`url`),
//        KEY `c_url` (`c_url`),
//        KEY `cpu` (`cpu`),
//        KEY `wt` (`wt`),
//        KEY `pmu` (`pmu`),
//        KEY `timestamp` (`timestamp`)
//        )
        Schema::create('xhprof_details', function (Blueprint $table) {
            $table->string('id',17)->primary();
            $table->string('url', 255)->nullable();
            $table->string('c_url', 255)->nullable();
            $table->timestamp('timestamp')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->string('server name', 64)->nullable();
            $table->tinyInteger('type')->nullable();
            $table->binary('cookie');
            $table->binary('post');
            $table->binary('get');
            $table->unsignedInteger('pmu')->nullable();
            $table->unsignedInteger('wt')->nullable();
            $table->unsignedInteger('cpu')->nullable();
            $table->string('server_id', 17)->default('t11');
            $table->string('aggregateCalls_include', 255)->nullable();
        });
        DB::statement("ALTER TABLE xhprof_details ADD perfdata MEDIUMBLOB AFTER `server name`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xhprof_details');
    }
}
