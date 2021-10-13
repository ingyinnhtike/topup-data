<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_log', function (Blueprint $table) {
            $table->increments('id');

            $table->string('merchant_request_id')->unique();
            $table->string('request_id')->unique();

            $table->integer('merchant_id')->unsigned()->nullable();
            $table->foreign('merchant_id')
                ->references('id')->on('merchants')
                ->onDelete('cascade');

            $table->integer('service_id')->unsigned()->nullable();
            $table->foreign('service_id')
                ->references('id')->on('services')
                ->onDelete('cascade');

            $table->integer('package_id')->unsigned()->nullable();
            $table->foreign('package_id')
                ->references('id')->on('packages')
                ->onDelete('cascade');

            $table->string('to');
            $table->string('operator');
            
            $table->string('status')->nullable();
            $table->string('description')->nullable();
            $table->string('resultcode')->nullable();

            $table->string('callback_status')->nullable();

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
        Schema::dropIfExists('request_log');
    }
}
