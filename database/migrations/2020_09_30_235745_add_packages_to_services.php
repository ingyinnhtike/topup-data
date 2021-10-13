<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPackagesToServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->integer('mpt_package_id')->unsigned()->nullable()->change();
            $table->integer('ooredoo_package_id')->unsigned()->nullable()->change();
            $table->integer('telenor_package_id')->unsigned()->nullable()->change();
            $table->integer('myTel_package_id')->unsigned()->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->integer('mpt_package_id')->unsigned()->nullable()->change();
            $table->integer('ooredoo_package_id')->unsigned()->nullable()->change();
            $table->integer('telenor_package_id')->unsigned()->nullable()->change();
            $table->integer('myTel_package_id')->unsigned()->nullable()->change();
        });
    }
}
