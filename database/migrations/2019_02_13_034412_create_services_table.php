<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServicesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('merchant_id')->unsigned();
            $table->string('service_name');
	        $table->string('CallBackUrl')->nullable();

            $table->integer('mpt_package_id')->unsigned();
            $table->integer('ooredoo_package_id')->unsigned();
            $table->integer('telenor_package_id')->unsigned();
            $table->integer('myTel_package_id')->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('mpt_package_id')->references('id')->on('packages');
            $table->foreign('ooredoo_package_id')->references('id')->on('packages');
            $table->foreign('telenor_package_id')->references('id')->on('packages');
            $table->foreign('myTel_package_id')->references('id')->on('packages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('services');
    }
}
