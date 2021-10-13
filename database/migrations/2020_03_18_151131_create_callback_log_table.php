<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallbackLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('callback_log', function (Blueprint $table) {
            $table->increments('id');
            $table->text('code');
            $table->string('request_id');

            $table->integer('merchant_id')->unsigned()->nullable();
            $table->foreign('merchant_id')
                ->references('id')->on('merchants')
                ->onDelete('cascade');

            $table->string('uuid');

            $table->integer('service_id')->unsigned()->nullable();
            $table->foreign('service_id')
                ->references('id')->on('services')
                ->onDelete('cascade');

            $table->string('service_name');
            $table->string('status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('callback_log');
    }
}
