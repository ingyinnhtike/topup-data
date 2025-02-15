<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->increments('id');

            $table->string('name');

            $table->string('email')->unique();

            $table->foreign('merchant_id')->references('id')->on('merchants')->onDelete('cascade');

            $table->integer('merchant_id')->unsigned()->nullable();

            $table->string('password');

            $table->tinyInteger('verified')->default(0);

            $table->string('email_token')->nullable();

	    $table->string('phone_number')->nullable();

            $table->string('token_2fa')->nullable();

            $table->datetime('token_2fa_expiry')->nullable();

            $table->rememberToken();

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
        Schema::dropIfExists('users');
    }
}
