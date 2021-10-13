<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOperatorsToBalanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('balance', function (Blueprint $table) {
            $table->integer('mpt')->after('merchant_id')->default(0);
            $table->integer('ooredoo')->after('mpt')->default(0);
            $table->integer('telenor')->after('ooredoo')->default(0);
            $table->integer('mytel')->after('telenor')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('balance', function (Blueprint $table) {
            //
        });
    }
}
