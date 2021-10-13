<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainBalanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_balance', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mpt');
            $table->integer('ooredoo');
            $table->integer('telenor');
            $table->integer('mytel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_balance');
    }
}
